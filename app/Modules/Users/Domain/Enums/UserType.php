<?php

namespace App\Modules\Users\Domain\Enums;

enum UserType :string
{
    case SuperAdmin = 'superadmin';
    case Admin = 'admin';
    case User = 'user';
    case Manager = 'manager';
    case Employee = 'employee';
    case Designer = 'designer';
    case Developer = 'developer';
    case Tester = 'tester';
    case ClientOrCustomer = 'customer';
    case VendorOrSupplier = 'vendor';
    case Contractor = 'contractor';
    case Accountant = 'accountant';
}
