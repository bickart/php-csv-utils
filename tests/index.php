<?php

/**
 * CSV Utils Unit Tests
 * 
 * In order to run these tests, you need to have simpletest installed in 
 * your include path somewhere.
 *
 * Special thanks to www.generatedata.com for our csv data
 */

// set_include_path('/path/to/simpletest' . get_include_path());

error_reporting(E_ALL);
ini_set('display_errors', 1);

// this is here to help me while I test this library
function pr($data) {

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

}

set_include_path(get_include_path() . PATH_SEPARATOR . realpath('../'));

// include simpletest classes
require_once 'simpletest/unit_tester.php';
require_once 'simpletest/reporter.php';
require_once 'simpletest/mock_objects.php';

// include classes we are testing
require_once 'Csv/Reader.php';
require_once 'Csv/Writer.php';

// include all tests
require_once 'TestCases/Reader.php';
require_once 'TestCases/Writer.php';

// run tests in html reporter
$test = new GroupTest('Core CSV Utilities Tests');
$test->addTestCase(new Test_Of_Csv_Reader);
$test->addTestCase(new Test_Of_Csv_Writer);
if (TextReporter::inCli()) {
    exit ($test->run(new TextReporter()) ? 0 : 1);
}
$test->run(new HtmlReporter());