<?php
/*
    title : creationAvatarC.php
    author : Hugo.L
    started on : 10/11/2019
    brief : controller avatar creating page
*/
class CreationAvatar
{
    private $error = [];

    function __construct()
    {
        //form sended
        if(!empty($_POST['creationAvatar']))
        {
            //create array of the form's values
            $formValues = [
                'name' => $_POST['name'],
                'alignement' => $_POST['alignement'],
                'notes' => $_POST['notes']
            ];

            if($this->isValid($formValues))
            {
                //add to database
                echo 'Valid form.';
            }
            else
            {
                //error : form no valid
                echo 'Not valid form.<br>';
                foreach($this->error as $value)
                {
                    echo $value . '<br>';
                }
            }
        }
    }

    /*
        name : isValid
        author : Hugo.L
        brief : verification of data returned by creation avatar's form
        input parameters : array $data
        return : boolean
    */
    public function isValid($data)
    {
        $formError = [];
        //name
        if(!ctype_alnum($data['name']))
        {
            array_push($formError, 'nameType');
        }
        if(strlen($data['name']) > 63)
        {
            array_push($formError, 'nameLenght');
        }

        //alignement
        switch ($data['alignement'])
        {
            case "agni":
                break;
            case "sûrya":
                break;
            case "vâyu":
                break;
            default:
                array_push($formError, 'alignement');
        }

        //notes : user can put what he wants

        //add form's error
        if(!empty($formError))
        {
            foreach($formError as $value)
            {
                array_push($this->error, $value);
            }
            return false;
        }
        else
        {
            return true;
        }
    }

    /*
        name : isError
        author : Hugo.L
        brief : search if the error exist
        input parameters : string $aError
        return : boolean
    */
    public function isError($aError)
    {
        foreach($this->error as $value)
        {
            if($value == $aError)
            {
                return true;
            }
        }

        return false;
    }
}
?>
