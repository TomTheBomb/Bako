<?php
class User extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
		),
		'down' => array(
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
        if ($direction == 'up') {
                $this->Politician = ClassRegistry::init('Politician');
                $this->Politician->query("
INSERT INTO `users` (`id`, `password`, `email`, `group_id`, `first_name`, `last_name`, `created`, `modified`, `location_id`) VALUES
(1, '', 'mountdruitt@parliament.nsw.gov.au', 3, '', 'Amery', '', '', 4232),
(2, '', 'tamworth@parliament.nsw.gov.au', 3, '', 'Anderson', '', '', 1321),
(3, '', 'miranda@parliament.nsw.gov.au', 3, '', 'Annesley', '', '', 646),
(4, '', 'albury@parliament.nsw.gov.au', 3, '', 'Aplin', '', '', 3633),
(5, '', 'penrith@parliament.nsw.gov.au', 3, '', 'Ayres', '', '', 4134),
(6, '', 'manly@parliament.nsw.gov.au', 3, '', 'Baird', '', '', 309),
(7, '', 'monaro@parliament.nsw.gov.au', 3, '', 'Barilaro', '', '', 3449),
(8, '', 'cessnock@parliament.nsw.gov.au', 3, '', 'Barr', '', '', 1106),
(9, '', 'londonderry@parliament.nsw.gov.au', 3, '', 'Bassett', '', '', 4124),
(10, '', 'portstephens@parliament.nsw.gov.au', 3, '', 'Baumann', '', '', 1093),
(11, '', 'willoughby@parliament.nsw.gov.au', 3, '', 'Berejiklian', '', '', 229),
(12, '', 'myalllakes@parliament.nsw.gov.au', 3, '', 'Bromhead', '', '', 1804),
(13, '', 'easthills@parliament.nsw.gov.au', 3, '', 'Brookes', '', '', 2212),
(14, '', 'linda.burney@parliament.nsw.gov.au', 3, '', 'Burney', '', '', 563),
(15, '', 'kogarah@parliament.nsw.gov.au', 3, '', 'Burton', '', '', 614),
(16, '', 'strathfield@parliament.nsw.gov.au', 3, '', 'Casuscelli', '', '', 405),
(17, '', 'riverstone@parliament.nsw.gov.au', 3, '', 'Conolly', '', '', 4223),
(18, '', 'bega@parliament.nsw.gov.au', 3, '', 'Constance', '', '', 2980),
(19, '', 'charlestown@parliament.nsw.gov.au', 3, '', 'Cornwell', '', '', 920),
(20, '', 'oatley@parliament.nsw.gov.au', 3, '', 'Coure', '', '', 624),
(21, '', 'maroubra@parliament.nsw.gov.au', 3, '', 'Daley', '', '', 173),
(22, '', 'mulgoa@parliament.nsw.gov.au', 3, '', 'Davies', '', '', 4198),
(23, '', 'ryde@parliament.nsw.gov.au', 3, '', 'Dominello', '', '', 365),
(24, '', 'campbelltown@parliament.nsw.gov.au', 3, '', 'Doyle', '', '', 3059),
(25, '', 'swansea@parliament.nsw.gov.au', 3, '', 'Edwards', '', '', 867),
(26, '', 'baulkhamhills@parliament.nsw.gov.au', 3, '', 'Elliott', '', '', 465),
(27, '', 'heathcote@parliament.nsw.gov.au', 3, '', 'Evans', '', '', 668),
(28, '', 'rockdale@parliament.nsw.gov.au', 3, '', 'Flowers', '', '', 612),
(29, '', 'coffsharbour@parliament.nsw.gov.au', 3, '', 'Fraser', '', '', 2066),
(30, '', 'lakemba@parliament.nsw.gov.au', 3, '', 'Furolo', '', '', 567),
(31, '', 'orange@parliament.nsw.gov.au', 3, '', 'Gee', '', '', 4491),
(32, '', 'lismore@parliament.nsw.gov.au', 3, '', 'George', '', '', 2518),
(33, '', 'menai@parliament.nsw.gov.au', 3, '', 'Gibbons', '', '', 521),
(34, '', 'goulburn@parliament.nsw.gov.au', 3, '', 'Goward', '', '', 3147),
(35, '', 'dubbo@parliament.nsw.gov.au', 3, '', 'Grant', '', '', 4621),
(36, '', 'clarence@parliament.nsw.gov.au', 3, '', 'Gulaptis', '', '', 2178),
(37, '', 'southcoast@parliament.nsw.gov.au', 3, '', 'Hancock', '', '', 2939),
(38, '', 'terrigal@parliament.nsw.gov.au', 3, '', 'Hartcher', '', '', 684),
(39, '', 'wollongong@parliament.nsw.gov.au', 3, '', 'Hay', '', '', 2679),
(40, '', 'wakehurst@parliament.nsw.gov.au', 3, '', 'Hazzard', '', '', 319),
(41, '', 'burrinjuck@parliament.nsw.gov.au', 3, '', 'Hodgkinson', '', '', 3627),
(42, '', 'gosford@parliament.nsw.gov.au', 3, '', 'Holstein', '', '', 734),
(43, '', 'wallsend@parliament.nsw.gov.au', 3, '', 'Hornery', '', '', 911),
(44, '', 'barwon@parliament.nsw.gov.au', 3, '', 'Humphries', '', '', 1633),
(45, '', 'granville@parliament.nsw.gov.au', 3, '', 'Issa', '', '', 486),
(46, '', 'hornsby@parliament.nsw.gov.au', 3, '', 'Kean', '', '', 269),
(47, '', 'heffron@parliament.nsw.gov.au', 3, '', 'Keneally', '', '', 134),
(48, '', 'cabramatta@parliament.nsw.gov.au', 3, '', 'Lalich', '', '', 505),
(49, '', 'parramatta@parliament.nsw.gov.au', 3, '', 'Lee', '', '', 460),
(50, '', 'ElectorateOffice.Liverpool@parliament.nsw.gov.au', 3, '', 'Lynch', '', '', 522),
(51, '', 'waggawagga@parliament.nsw.gov.au', 3, '', 'Maguire', '', '', 3765),
(52, '', 'macquariefields@parliament.nsw.gov.au', 3, '', 'McDonald', '', '', 531),
(53, '', 'bankstown@parliament.nsw.gov.au', 3, '', 'Mihailuk', '', '', 572),
(54, '', 'sydney@parliament.nsw.gov.au', 3, '', 'Moore', '', '', 141),
(55, '', 'coogee@parliament.nsw.gov.au', 3, '', 'Notley-Smith', '', '', 142),
(56, '', 'davidson@parliament.nsw.gov.au', 3, '', 'O''Dea', '', '', 252),
(57, '', 'kuringgai@parliament.nsw.gov.au', 3, '', 'O''Farrell', '', '', 267),
(58, '', 'newcastle@parliament.nsw.gov.au', 3, '', 'Owen', '', '', 949),
(59, '', 'ballina@parliament.nsw.gov.au', 3, '', 'Page', '', '', 2455),
(60, '', 'balmain@parliament.nsw.gov.au', 3, '', 'Parker', '', '', 186),
(61, '', 'Robyn.Parker@parliament.nsw.gov.au', 3, '', 'Parker', '', '', 1020),
(62, '', 'keira@parliament.nsw.gov.au', 3, '', 'Park', '', '', 2798),
(63, '', 'camden@parliament.nsw.gov.au', 3, '', 'Patterson', '', '', 3096),
(64, '', 'castlehill@parliament.nsw.gov.au', 3, '', 'Perrottet', '', '', 468),
(65, '', 'auburn@parliament.nsw.gov.au', 3, '', 'Perry', '', '', 435),
(66, '', 'murrumbidgee@parliament.nsw.gov.au', 3, '', 'Piccoli', '', '', 3892),
(67, '', 'lakemacquarie@parliament.nsw.gov.au', 3, '', 'Piper', '', '', 886),
(68, '', 'tweed@parliament.nsw.gov.au', 3, '', 'Provest', '', '', 2653),
(69, '', 'toongabbie@parliament.nsw.gov.au', 3, '', 'Rees', '', '', 450),
(70, '', 'blacktown@parliament.nsw.gov.au', 3, '', 'Robertson', '', '', 453),
(71, '', 'lanecove@parliament.nsw.gov.au', 3, '', 'Roberts', '', '', 357),
(72, '', 'smithfield@parliament.nsw.gov.au', 3, '', 'Rohan', '', '', 497),
(73, '', 'wollondilly@parliament.nsw.gov.au', 3, '', 'Rowell', '', '', 3125),
(74, '', 'bluemountains@parliament.nsw.gov.au', 3, '', 'Sage', '', '', 4263),
(75, '', 'drummoyne@parliament.nsw.gov.au', 3, '', 'Sidoti', '', '', 204),
(76, '', 'northshore@parliament.nsw.gov.au', 3, '', 'Skinner', '', '', 297),
(77, '', 'epping@parliament.nsw.gov.au', 3, '', 'Smith', '', '', 391),
(78, '', 'upperhunter@parliament.nsw.gov.au', 3, '', 'Souris', '', '', 1224),
(79, '', 'cronulla@parliament.nsw.gov.au', 3, '', 'Speakman', '', '', 648),
(80, '', 'TheEntrance@parliament.nsw.gov.au', 3, '', 'Spence', '', '', 810),
(81, '', 'pittwater@parliament.nsw.gov.au', 3, '', 'Stokes', '', '', 333),
(82, '', 'oxley@parliament.nsw.gov.au', 3, '', 'Stoner', '', '', 1931),
(83, '', 'marrickville@parliament.nsw.gov.au', 3, '', 'Tebbutt', '', '', 580),
(84, '', 'paul.toole@parliament.nsw.gov.au', 3, '', 'Toole', '', '', 4362),
(85, '', 'northerntablelands@parliament.nsw.gov.au', 3, '', 'Torbay', '', '', 1376),
(86, '', 'vaucluse@parliament.nsw.gov.au', 3, '', 'Upton', '', '', 142),
(87, '', 'kiama@parliament.nsw.gov.au', 3, '', 'Ward', '', '', 2766),
(88, '', 'shellharbour@parliament.nsw.gov.au', 3, '', 'Watson', '', '', 2747),
(89, '', 'wyong@parliament.nsw.gov.au', 3, '', 'Webber', '', '', 790),
(90, '', 'murraydarling@parliament.nsw.gov.au', 3, '', 'Williams', '', '', 4952),
(91, '', 'hawkesbury@parliament.nsw.gov.au', 3, '', 'Williams', '', '', 472),
(92, '', 'portmacquarie@parliament.nsw.gov.au', 3, '', 'Williams', '', '', 1982),
(93, '', 'fairfield@parliament.nsw.gov.au', 3, '', 'Zangari', '', '', 501);
");
            }

		return true;
	}
}
