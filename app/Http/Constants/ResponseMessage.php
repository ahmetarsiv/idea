<?php

namespace App\Http\Constants;

class ResponseMessage
{

    public static function SuccessMessage(): array
    {
        return [
            'status'    => true,
            'title'     => 'Başarılı',
            'message'   => 'İşleminiz başarılı bir şekilde gerçekleştirildi.',
        ];
    }

    public static function ErrorMessage(): array
    {
        return [
            'status'    => false,
            'title'     => 'Başarısız',
            'message'   => 'İşleminiz gerçekleştirilirken bir hata ile karşılaşıldı. Lütfen tekrar deneyiniz.'
        ];
    }
}
