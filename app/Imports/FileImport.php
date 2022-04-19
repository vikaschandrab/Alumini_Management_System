<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FileImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
            $emailData = User::where('email','=',$row['email'])->first();
            if(empty($emailData))
            {
                $phoneData = User::where('phone','=',$row['phone'])->first();
                if(empty($phoneData))
                {
                    return new User([
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'phone' => $row['phone'],
                        'userType' => $row['usertype'],
                        ]);
                }
            }
    }
}
