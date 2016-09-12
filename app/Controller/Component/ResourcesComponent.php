<?php
App::uses('Component', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class ResourcesComponent extends Component {

    function uploadFiles($folder, $formdata, $itemId = null, array $permitted) {

    // setup dir names absolute and relative
    $folder_url = WWW_ROOT.$folder;
    $rel_url = $folder;

    // create the folder if it does not exist
    if(!is_dir($folder_url)) {
        mkdir($folder_url);
    }

    // if itemId is set create an item folder
    if($itemId) {
        // set new absolute folder
        $folder_url = WWW_ROOT.$folder.'/'.$itemId;
        // set new relative folder
        $rel_url = $folder.'/'.$itemId;
        // create directory
        if(!is_dir($folder_url)) {
            mkdir($folder_url);
        }
    }

    // list of permitted file types, this is only images but documents can be added
    //$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');
    // loop through and deal with the files
    // replace spaces with underscores
    $filename = str_replace(' ', '_', $formdata['name']);
    // assume filetype is false
    $typeOK = false;
    // check filetype is ok
    foreach($permitted as $type) {

        if($type == $formdata['type']) {
            $typeOK = true;
            break;
        }else{
            $typeOK = false;
        }
    }

    // if file type ok upload the file
    if($typeOK == true) {
        // switch based on error code
        switch($formdata['error']) {
            case 0:
                // check filename already exists
                if(!file_exists($folder_url.'/'.$filename)) {
                    // create full filename
                    $full_url = $folder_url.'/'.$filename;
                    $url = $rel_url.'/'.$filename;
                    // upload the file
                    $success = move_uploaded_file($formdata['tmp_name'], $url);
                } else {
                    // create unique filename and upload file
                    ini_set('date.timezone', 'Europe/London');
                    $now = date('Y-m-d-His');
                    $full_url = $folder_url.'/'.$now.$filename;
                    $url = $rel_url.'/'.$now.$filename;
                    $success = move_uploaded_file($formdata['tmp_name'], $url);
                }
                // if upload was successful
                if($success) {
                    // save the url of the file
                    $result['urls'][] = $url;
                } else {
                    $result['errors'][] = "Error uploaded $filename. Please try again.";
                }
                break;
            case 3:
                // an error occured
                $result['errors'][] = "Error uploading $filename. Please try again.";
                break;
            default:
                // an error occured
                $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                break;
        }
    } elseif($typeOK == false) {
        // unacceptable file type
        $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
    } elseif($formdata['error'] == 4)  {
        // no file was selected for upload
        $result['nofiles'][] = "No file Selected";
    }
    return $result;
}

    function sendSMS($phone, $message){
        App::uses('HttpSocket', 'Network/Http');
        $HttpSocket = new HttpSocket();
        $results = $HttpSocket->post('http://www.mobileautomatedsystems.com/components/com_spc/smsapi.php', array('username' => 'noibilism', 'password' => 'noheeb', 'sender' => 'ZEO Ifo', 'recipient' => $phone, 'message' => $message));
        return $results;
    }

}
