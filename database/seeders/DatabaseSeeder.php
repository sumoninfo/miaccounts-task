<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Group::factory(5)
            ->has(AccountHead::factory()->count(5)
                ->has(Transaction::factory()->count(3))
            )->create();
        /*AccountHead::factory(5)
            ->has(Transaction::factory()->count(3))
            ->create();*/
    }
}
