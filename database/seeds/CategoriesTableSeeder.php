<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create( [
            'name'=>'1'
        ] );
        Category::create( [
            'name'=>'2'
        ] );
        Category::create( [
            'name'=>'3'
        ] );
        Category::create( [
            'name'=>'4'
        ] );
        Category::create( [
            'name'=>'5'
        ] );
        Category::create( [
            'name'=>'sub_1',
            'parent_id'=>'1',
            'depth'=>'2'
        ] );
        Category::create( [
            'name'=>'sub_2',
            'parent_id'=>'1',
            'depth'=>'2'
        ] );
        Category::create( [
            'name'=>'sub_1_1',
            'parent_id'=>'6',
            'depth'=>'3'
        ] );
        Category::create( [
            'name'=>'sub_1_2',
            'parent_id'=>'6',
            'depth'=>'3'
        ] );
        Category::create( [
            'name'=>'sub_5',
            'parent_id'=>'5',
            'depth'=>'2'
        ] );
    }
}
