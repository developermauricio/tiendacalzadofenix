<?php
namespace PixelYourSite;
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class OfflineEventsExportFile {

    private $output;

    function getHeadItems() {
        return array( 'order_id','email', 'phone', 'fn', 'ln', 'ct', 'st', 'country', 'zip','event_name','event_time', 'value','currency','content_ids' );
    }

    function writeLine($data) {
        fputcsv( $this->output, $data );
    }

    function openFile($filePath,$page) {
        if(file_exists($filePath) && $page > 1) {
            $this->output = fopen( $filePath, 'a' ); // add more data
        } else {
            $this->output = fopen( $filePath, 'w+' ); // create new file or replace old
            $this->writeLine($this->getHeadItems());
        }
    }

    function closeFile() {
        fclose($this->output);
    }
}