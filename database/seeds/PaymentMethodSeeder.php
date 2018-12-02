<?php

use App\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    private $daftar = [
        ['bca', 'BCA'],
        ['bri', 'BRI'],
        ['bni', 'BNI'],
        ['man', 'Mandiri'],
        ['alfam', 'Alfamart'],
        ['indom', 'Indomarett']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->daftar as $method){
            PaymentMethod::create([
                'nama' => $method[1],
                'kode' => $method[0]
            ]);
        }
    }
}
