<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Folder;
use App\Models\Link;
use App\Models\Project;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Status::factory()->create(['name' => 'active']);
        Status::factory()->create(['name' => 'archived']);

        $numberOfProjects = 10;

        for($i = 0; $i < $numberOfProjects; $i++) {
            $project = Project::factory()->create();
            $folder = Folder::factory()->create(['project_id' => $project->id]);
            $link = Link::factory()->create(['folder_id' => $folder->id]);
            $file = File::factory()->create(['folder_id' => $folder->id]);
        }
    }
}
