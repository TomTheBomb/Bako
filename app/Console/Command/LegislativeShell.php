<?php

class LocalityBuildShell extends AppShell {

    public $uses = array('', 'Geoname', 'State', 'GeonamesCity', 'City');

    public function main() {
        $help = <<<TEXT

The LocalityBuild Shell
---------------------------------------------------------------
Usage: cake locality_build <command>
---------------------------------------------------------------

Commands:

    locality_build country
            Populate country model

TEXT;
        $this->out($help);
    }

    public function getOptionParser() {
        $parser = parent::getOptionParser();
        $parser->addArgument('filename', array(
                'help' => 'Full path to admin1CodesASCII.txt'
            )
        );
        return $parser;

    }

/**
 * country
 *
 * Find Users with no slugs and generate
 * return void
 */
    public function country() {
        $countries = $this->Geoname->countryInfo();

        foreach ($countries['geonames'] as $country) {
            $data['Country'] = $country;
            $this->Country->save($data);
        }
    }

    public function state() {
        if ($this->args[0]) {
            $filename = $this->args[0];
        }
        if (!file_exists($filename)) {
            return;
        }
        $row = 1;
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, "\t")) !== FALSE) {
                $num = count($data);
                $row++;
                $state['State'] = array();
                $state['State']['adminCode'] = $data[0];
                $state['State']['name'] = $data[1];
                $state['State']['fullname'] = $data[2];
                $state['State']['geonameId'] = $data[3];
                $this->State->save($state);
            }
            fclose($handle);
        }
    }

    public function city() {
        $cities = $this->GeonamesCity->find('all');
        foreach ($cities as $city) {
            $data['City'] = $city['GeonamesCity'];
            $this->City->save($data);
        }
    }

}


