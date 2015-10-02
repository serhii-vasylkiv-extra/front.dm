<?php

class Application_Form_Job extends Zend_Form
{

    public function init()
    {
        $this->setName('job');
        $isEmptyMessage = 'ERROR Empty value';

        $id = new Zend_Form_Element_Text('id');
        $id->setLabel('Id')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $jobTitle = new Zend_Form_Element_Text('jobTitle');
        $jobTitle->setLabel('Title')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $jobSalary = new Zend_Form_Element_Text('jobSalary');
        $jobSalary->setLabel('Salary')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $location = new Zend_Form_Element_Text('location');
        $location->setLabel('Location')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $contactEmail = new Zend_Form_Element_Text('contactEmail');
        $contactEmail->setLabel('Contact email')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $endTime = new Zend_Form_Element_Text('endTime');
        $endTime->setLabel('End time')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $occupation = new Zend_Form_Element_Text('occupation');
        $occupation->setLabel('Occupation')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );
        $industry = new Zend_Form_Element_Text('industry');
        $industry->setLabel('Industry')
            ->setRequired(true)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty', true,
                array('messages' => array('isEmpty' => $isEmptyMessage))
            );

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');

        $this->addElements(array(
            $id,
            $jobTitle,
            $jobSalary,
            $location,
            $contactEmail,
            $endTime,
            $occupation,
            $industry,
            $submit
        ));
    }
}

