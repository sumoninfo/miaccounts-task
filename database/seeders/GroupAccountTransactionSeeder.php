<?php

namespace Database\Seeders;

use App\Models\AccountHead;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupAccountTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Group with subgroup data store
         */
        DB::insert("INSERT INTO `groups` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
	(1, 'Group 1', NULL, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(2, 'Group 2', 1, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(3, 'Group 3', 2, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(4, 'Group 4', NULL, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(5, 'Group 5', NULL, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(6, 'Group 6', 4, '2022-09-18 18:46:20', '2022-09-18 18:46:20'),
	(7, 'Group 7', NULL, '2022-09-18 18:46:20', '2022-09-18 18:46:20');");

        /**
         * Account head with transaction data store
         */
        AccountHead::factory(15)
            ->has(Transaction::factory()->count(3))
            ->create();

        /*Group::factory(7)
          ->has(AccountHead::factory()->count(2)
              ->has(Transaction::factory()->count(3))
          )->create([
              'parent_id' => Group::query()->count() > 0
                  ? Group::all()->random()->id
                  : null,
          ]);*/
    }
}
