<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\{AddressRepository, UserRepository};

class AddressController extends Controller
{
    public function __construct(
        protected UserRepository $userRepository,
        protected AddressRepository $address
    ) {
    }

    public function index()
    {
        // $this->userRepository->createAddress(1, [
        //     'line1' => rand(10, 100) . ' - street',
        // ]);

        // $this->userRepository->deleteAddress(1, 1);
    }
}
