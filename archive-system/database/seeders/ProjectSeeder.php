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
        ]);

        for($i = 0; $i < 3; $i++) {
            User::factory()->create([
                'name' => 'Project Owner ' . $i,
                'email' => 'po' . $i . '@gmail.com',
                'type_id' => 2,
            ]);
        }

        Status::factory()->create(['name' => 'active']);
        Status::factory()->create(['name' => 'archived']);

        $numberOfProjects = 10;

        for($i = 0; $i < $numberOfProjects; $i++) {
            $project = Project::factory()->create();
            DB::table('project_user')->insert(['user_id' => $user->id, 'project_id' => $project->id]);
            for($j = 0; $j < 6; $j++) {
                $folder = Folder::factory()->create(['project_id' => $project->id]);
                $link = Link::factory()->create(['folder_id' => $folder->id]);
                $file = File::factory()->create(['folder_id' => $folder->id]);
            }
        }
    }
}
