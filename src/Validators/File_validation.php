<?php
namespace Validators;


class File_validation
{
    public function Validation($data)
    {

        $Errors = [];
        if ($data['Organization'] == '') {
            $Errors['Organization'] = "<h5> Поле Организация обязательно для заполнения </h5>";
        }

        if ($data['Counterparty'] == '') {
            $Errors['Counterparty'] = "<h5> Поле Контрагент обязательно для заполнения </h5>";
        }


        if ($data['Signatory'] == '') {
            $Errors['Signatory'] = "<h5> Поле Подписант обязательно для заполнения </h5>";
        }

        if ($data['Term-in'] == '') {
            $Errors['Term-in'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        }
        if ($data['Term-out'] == '') {
            $Errors['Term-out'] = "<h5>Поле Срок договора обязательно для заполнения </h5>";
        }

        if ($data['Product'] == '') {
            $Errors['Product'] = "<h5>Поле Предмет договора обязательно для заполнения </h5>";
        }
        if ($data['Amount'] == '') {
            $Errors['Amount'] = "<h5>Поле Сумма договора обязательно для заполнения </h5>";
        }
        if ($data['Requisites'] == '') {
            $Errors['Requisites'] = "<h5>Поле Реквизиты обязательно для заполнения </h5>";
        }

        return $Errors;
    }
}

?>