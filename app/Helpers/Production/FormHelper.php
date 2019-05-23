<?php
namespace App\Helpers\Production;

use App\Helpers\FormHelperInterface;
use Illuminate\Http\Request;

class FormHelper implements FormHelperInterface
{
    public function __construct(
    ) {
    }

    public function suggestpriceList()
    {
      $price_list = [
        1000,
        2000,
        3000,
        4000,
        5000,
        8000,
        10000,
        15000,
        20000,
        30000,
      ];

      return $price_list;
    }

    public function suggestOpeningHoursList()
    {
      $time_list = [
        '朝営業（5時～10時）',
        'ランチ（10時～14時）',
        'ディナータイム（17時～24時）',
        '深夜営業（23時～29時）',
        '24時間営業'
      ];

      return $time_list;
    }

}
