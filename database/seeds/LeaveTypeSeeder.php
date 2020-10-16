<?php

use App\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leave_type = LeaveType::create([
            'name'  => 'Sick Leaves',
            'amount' => '12',
        ]);

        $leave_type = LeaveType::create([
            'name'  => 'Casual Leaves',
            'amount' => '12',
        ]);
    }
}
