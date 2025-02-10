<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Salary', 'type' => 'Income'],
            ['name' => 'Allowance', 'type' => 'Income'],
            ['name' => 'Bonus', 'type' => 'Income'],
            ['name' => 'Other', 'type' => 'Income'],
            ['name' => 'Food', 'type' => 'Expense'],
            ['name' => 'Transportation', 'type' => 'Expense'],
            ['name' => 'Beauty', 'type' => 'Expense'],
            ['name' => 'Education', 'type' => 'Expense'],
            ['name' => 'Health', 'type' => 'Expense'],
            ['name' => 'Gift', 'type' => 'Expense'],
            ['name' => 'Accessories', 'type' => 'Expense'],
            ['name' => 'Household', 'type' => 'Expense'],
            ['name' => 'Vehicle', 'type' => 'Expense'],
            ['name' => 'Other', 'type' => 'Expense'],
        ];

        $users = Auth::user()->id;
        foreach ($users as $user) {
            foreach ($categories as $category) {
                Category::firstOrCreate([
                    'name' => $category['name'],
                    'type' => $category['type'],
                    'user_id' => $user
                ]);
            }
        }
    }
}
