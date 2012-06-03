<?php
App::uses('Group', 'Model');
App::uses('Controller', 'Controller');
App::uses('ComponentCollection', 'Controller');
App::uses('AclComponent', 'Controller/Component');
App::uses('AclExtrasShell', 'Plugin/AclExtras/Console/Command');
class AclRebuildShell extends AppShell {

    /**
    * Contains instance of AclComponent
    *
    * @var AclComponent
    * @access public
    */
    public $Acl;

    public $Group;

    public function startup() {
        parent::startup();
        $this->aclExtras = new AclExtrasShell();
        $this->Group = new Group();
        $controller = new Controller();
        $collection = new ComponentCollection();
        $this->Acl = new AclComponent($collection);
        $this->Acl->startup($controller);
    }

    /**
     * Default cake execution action
     * @return void
     */
    public function main()
    {
        //Clear the tables for a fresh permission build
        $this->clearTables();
        //Ensure our groups are all created
        $this->buildGroups();
        //Rebuild
        $this->aclExtras->startup();
        $this->aclExtras->aco_sync();
        $this->buildPermissions();
    
    }
    /**
     * Clears the following tables to make them ready for permission rebuilding.
     * aros_acos
     * acos
     * aros
     */
    public function clearTables()
    {
        $this->Group->query('truncate acos');
        //$this->Group->query('truncate aros'); <-- Groups need to be re-created if this runs or at least an update
        $this->Group->query('truncate aros_acos');
    }

    public function buildGroups()
    {
        //Define what belongs to where
        $groups = array(
            'users', 'administrators', 'politicians',
        );

        //Make sure all of the groups exist
        foreach ($groups as $key => $group) {
            $foundGroup = $this->Group->find('first', array(
                'conditions' => array(
                    'Group.name' => $group,
                ),
            ));

            //Create the group if it doesnt exist
            if (!$foundGroup) {
                $this->Group->saveAll(array('id' => $key + 1, 'name' => $group));
            }
        }
    }
    
    public function buildPermissions()
    {
        //User permissions find the group id
        $userGroup = $this->Group->find('first', array(
            'conditions' => array(
                'Group.name' => 'users',
            ),
            'contain' => false,
        ));
        
        //Granting access to "controllers" is considered administrative access
        $this->Group->id = $userGroup['Group']['id'];
        $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $this->Group->id), 'controllers/Users');
        $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $this->Group->id), 'controllers/Questions');
   
        //Politicians
        $poliGroup = $this->Group->find('first', array(
            'conditions' => array(
                'Group.name' => 'politicians',
            ),
        ));
        
        $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $poliGroup['Group']['id']), 'controllers/Users');
        $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $poliGroup['Group']['id']), 'controllers/Answers');

        //Administrators
        $adminGroup = $this->Group->find('first', array(
            'conditions' => array(
                'Group.name' => 'administrators',
            ),
            'contain' => false,
        ));

        $this->Acl->allow(array('model' => 'Group', 'foreign_key' => $adminGroup['Group']['id']), 'controllers');
    }
}
