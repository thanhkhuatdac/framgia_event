<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(SubjectsTableSeeder::class);
        // $this->call(EventPlansTableSeeder::class);
        // $this->call(EventForksTableSeeder::class);
        // $this->call(EventPlanDetailsTableSeeder::class);
        // $this->call(EventForkDetailsTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(ServicesTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'trungquan_freelancer',
                'email' => 'trungquan_freelancer@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456789',
                'address' => 'Hà Nội, Việt Nam',
                'description' => 'Description demo',
                'image' => 'trungquan.jpg',
                'role' => 'freelancer',
                'created_at' => new DateTime()
            ], [
                'name' => 'trungquan_customer',
                'email' => 'trungquan_customer@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456788',
                'address' => 'Hà Nội, Việt Nam',
                'description' => 'Description demo',
                'image' => 'default-avatar.jpg',
                'role' => 'customer',
                'created_at' => new DateTime()
            ], [
                'name' => 'trungquan_admin',
                'email' => 'trungquan_admin@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456783',
                'address' => 'Hà Nội, Việt Nam',
                'description' => 'Description demo',
                'image' => 'default-avatar.jpg',
                'role' => 'admin',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('subjects')->insert([
            [
                'title' => 'Cưới Hỏi',
                'slug' => 'cuoi-hoi',
                'image' => 'cuoi-hoi.jpg',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class EventPlansTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('event_plans')->insert([
            [
                'title' => 'Tổ chức Đám Cưới Trọn Gói',
                'slug' => 'to-chuc-dam-cuoi-tron-goi',
                'amount' => '11500000',
                'content' => '',
                'album' => '',
                'user_id' => '1',
                'subject_id' => '1',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class EventForksTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('event_forks')->insert([
            [
                'status' => '0',
                'start_date' => '2017-10-21 06:00:00',
                'due_date' => '2017-10-21 23:00:00',
                'event_plan_id' => '1',
                'user_id' => '1',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class EventPlanDetailsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('event_plan_details')->insert([
            [
                'name' => 'Trang trí nhà hàng',
                'start_date' => '2017-10-21 06:00:00',
                'due_date' => '2017-10-21 07:00:00',
                'amount' => '370000',
                'status' => '1',
                'event_plan_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Chuẩn bị mâm quà',
                'start_date' => '2017-10-21 07:00:00',
                'due_date' => '2017-10-21 08:00:00',
                'amount' => '800000',
                'status' => '1',
                'event_plan_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Chương trình chính',
                'start_date' => '2017-10-21 08:00:00',
                'due_date' => '2017-10-21 11:00:00',
                'amount' => '4000000',
                'status' => '1',
                'event_plan_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Ăn trưa',
                'start_date' => '2017-10-21 11:00:00',
                'due_date' => '2017-10-21 12:00:00',
                'amount' => '3000000',
                'status' => '1',
                'event_plan_id' => '1',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class EventForkDetailsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('event_fork_details')->insert([
            [
                'name' => 'Trang trí nhà hàng',
                'start_date' => '2017-10-21 06:00:00',
                'due_date' => '2017-10-21 07:00:00',
                'amount' => '370000',
                'status' => '1',
                'event_fork_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Chuẩn bị mâm quà',
                'start_date' => '2017-10-21 07:00:00',
                'due_date' => '2017-10-21 08:00:00',
                'amount' => '800000',
                'status' => '1',
                'event_fork_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Chương trình chính',
                'start_date' => '2017-10-21 08:00:00',
                'due_date' => '2017-10-21 11:00:00',
                'amount' => '4000000',
                'status' => '1',
                'event_fork_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Ăn trưa',
                'start_date' => '2017-10-21 11:00:00',
                'due_date' => '2017-10-21 12:00:00',
                'amount' => '3000000',
                'status' => '1',
                'event_fork_id' => '1',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Nhân viên',
                'slug' => 'nhan-vien',
                'created_at' => new DateTime()
            ], [
                'name' => 'Đồ ăn',
                'slug' => 'do-an',
                'created_at' => new DateTime()
            ], [
                'name' => 'Đồ dùng chung',
                'slug' => 'do-dung-chung',
                'created_at' => new DateTime()
            ], [
                'name' => 'Đồ dùng kỹ thuật',
                'slug' => 'do-dung-ky-thuat',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Nhân viên trang trí',
                'price' => '1000000',
                'description' => 'nhan vien trang tri',
                'category_id' => '1',
                'event_plan_detail_id' => '1',
                'event_fork_detail_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Bàn ghế',
                'price' => '2000000',
                'description' => 'ban ghe',
                'category_id' => '3',
                'event_plan_detail_id' => '1',
                'event_fork_detail_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Vải phủ bàn',
                'price' => '500000',
                'description' => 'vai phu ban',
                'category_id' => '3',
                'event_plan_detail_id' => '1',
                'event_fork_detail_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Bóng bay',
                'price' => '200000',
                'description' => 'bong bay',
                'category_id' => '3',
                'event_plan_detail_id' => '1',
                'event_fork_detail_id' => '1',
                'created_at' => new DateTime()
            ], [
                'name' => 'Mâm đựng hoa quả',
                'price' => '200000',
                'description' => 'mam dung hoa qua',
                'category_id' => '3',
                'event_plan_detail_id' => '2',
                'event_fork_detail_id' => '2',
                'created_at' => new DateTime()
            ], [
                'name' => 'Hoa',
                'price' => '200000',
                'description' => 'hoa',
                'category_id' => '2',
                'event_plan_detail_id' => '2',
                'event_fork_detail_id' => '2',
                'created_at' => new DateTime()
            ], [
                'name' => 'Quả',
                'price' => '200000',
                'description' => 'mam dung hoa qua',
                'category_id' => '2',
                'event_plan_detail_id' => '2',
                'event_fork_detail_id' => '2',
                'created_at' => new DateTime()
            ], [
                'name' => 'Thuê nhân viên',
                'price' => '200000',
                'description' => 'thue nhan vien',
                'category_id' => '1',
                'event_plan_detail_id' => '2',
                'event_fork_detail_id' => '2',
                'created_at' => new DateTime()
            ], [
                'name' => 'Thuê MC dẫn chương trình',
                'price' => '1000000',
                'description' => 'thue mc dan chuong trinh',
                'category_id' => '1',
                'event_plan_detail_id' => '3',
                'event_fork_detail_id' => '3',
                'created_at' => new DateTime()
            ], [
                'name' => 'Loa đài ánh sáng',
                'price' => '1000000',
                'description' => 'loa dai anh sang',
                'category_id' => '4',
                'event_plan_detail_id' => '3',
                'event_fork_detail_id' => '3',
                'created_at' => new DateTime()
            ], [
                'name' => 'Vũ đoàn (hát nhảy)',
                'price' => '1000000',
                'description' => 'vu doan hat nhay',
                'category_id' => '1',
                'event_plan_detail_id' => '3',
                'event_fork_detail_id' => '3',
                'created_at' => new DateTime()
            ], [
                'name' => 'Quay phim chụp hình',
                'price' => '1000000',
                'description' => 'quay phim chup hinh',
                'category_id' => '1',
                'event_plan_detail_id' => '3',
                'event_fork_detail_id' => '3',
                'created_at' => new DateTime()
            ], [
                'name' => 'Thuê đầu bếp',
                'price' => '1000000',
                'description' => 'thue dau bep',
                'category_id' => '1',
                'event_plan_detail_id' => '4',
                'event_fork_detail_id' => '4',
                'created_at' => new DateTime()
            ], [
                'name' => 'Thuê phục vụ bàn và dọn dẹp',
                'price' => '1000000',
                'description' => 'thue phuc vu ban va don dep',
                'category_id' => '1',
                'event_plan_detail_id' => '4',
                'event_fork_detail_id' => '4',
                'created_at' => new DateTime()
            ], [
                'name' => 'Chi phí đồ ăn',
                'price' => '1000000',
                'description' => 'chi phi do an',
                'category_id' => '2',
                'event_plan_detail_id' => '4',
                'event_fork_detail_id' => '4',
                'created_at' => new DateTime()
            ]
        ]);
    }
}
