<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Folder;
use App\Models\Link;
use App\Models\Project;
use App\Models\Status;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::factory()->create(['name' => 'admin']);
        Type::factory()->create(['name' => 'projectowner']);
        Type::factory()->create(['name' => 'user']);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'type_id' => '1',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::factory()->create([
            'name' => 'Projectleader',
            'email' => 'Leader@example.com',
            'type_id' => '2',
            'password' => Hash::make('password'),
        ]);

        Status::factory()->create(['name' => 'active']);
        Status::factory()->create(['name' => 'archived']);

        $numberOfProjects = 10;

        for($i = 0; $i < $numberOfProjects; $i++) {
            $project = Project::factory()->create();
            DB::table('project_user')->insert(['user_id' => $user->id, 'project_id' => $project->id]);
            for($j = 0; $j < 6; $j++) {
                $folder = Folder::factory()->create(['project_id' => $project]);

                for($k = 0; $k < 6; $k++)
                {
                    $subfolder = Folder::factory()->create([
                        'project_id' => $project,
                        'parent_id' => $folder->id,
                        'type' => 'inner',
                    ]);
                    for($q = 0; $q < 6; $q++)
                    {
                        $link = Link::factory()->create([
                            'folder_id' => $subfolder,
                        ]);

                        $file = File::factory()->create([
                            'folder_id' => $subfolder,
                        ]);
                    }
                }
            }
        }
    }
}
