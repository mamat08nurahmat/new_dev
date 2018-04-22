<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Export to Excel with CI and Spout
 *
 * @author budy k
 *
 */

//load Spout Library
require_once APPPATH.'/third_party/spout/src/Spout/Autoloader/autoload.php';

//lets Use the Spout Namespaces
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;

// class Export extends Publicapi_Controller
class Export_spout extends CI_Controller
{
    public function index()
    {
        $writer = WriterFactory::create(Type::XLSX);
        //$writer = WriterFactory::create(Type::CSV); // for CSV files
        //$writer = WriterFactory::create(Type::ODS); // for ODS files

        //stream to browser
        $writer->openToBrowser("testing.xlsx");

        $header = array(

            'No SP',
            'Tgl SP',
            'Payment'
        );
        $writer->addRow($header); // add a row at a time

        $rows = array(
            array('SP-903923', '2017-11-12', '35'),
            array('SP-6546', '2017-10-29', '7567'),
            array('SP-546546', '2017-08-29', '3453'),
            array('SP-675677', '2017-02-29', '4654'),
            array('SP-324344', '2017-12-29', '9789')
        );

        $writer->addRows($rows); // add multiple rows at a time

        $writer->close();

    }
}