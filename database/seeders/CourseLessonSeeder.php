<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;

class CourseLessonSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================
        // COURSE 1 — GUITAR
        // ==========================
        $guitarCourse = Course::create([
            'title'         => 'Guitar Beginner Essentials',
            'slug'          => 'guitar-beginner-essentials',
            'category'      => 'Guitar',
            'level'         => 'Beginner',
            'description'   => 'Start your guitar journey from zero. Learn chords, strumming patterns, and basic songs.',
            // Harga dalam RUPIAH (tanpa desimal)
            'price'         => 49000, // Rp 49.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Guitar+Beginner',
            'video_url'     => 'https://www.youtube.com/embed/5a2w3UuN7Yk',
        ]);

        Lesson::create([
            'course_id'   => $guitarCourse->id,
            'title'       => 'Introduction to the Guitar',
            'description' => 'Get to know the parts of the guitar and how to hold it correctly.',
            'video_url'   => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $guitarCourse->id,
            'title'       => 'Basic Chords: C, G, Am, F',
            'description' => 'Learn your first essential chords.',
            'video_url'   => null,
            'order'       => 2,
        ]);

        Lesson::create([
            'course_id'   => $guitarCourse->id,
            'title'       => 'Strumming Patterns for Beginners',
            'description' => 'Simple strumming techniques to play your first songs.',
            'video_url'   => null,
            'order'       => 3,
        ]);

        // ==========================
        // COURSE 2 — PIANO
        // ==========================
        $pianoCourse = Course::create([
            'title'         => 'Advanced Piano Techniques',
            'slug'          => 'advanced-piano-techniques',
            'category'      => 'Piano',
            'level'         => 'Advanced',
            'description'   => 'Enhance your piano playing with advanced techniques, voicings, and improvisation.',
            // Harga dalam RUPIAH (tanpa desimal)
            'price'         => 79000, // Rp 79.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Advanced+Piano',
            'video_url'     => 'https://www.youtube.com/embed/9bZkp7q19f0',
        ]);

        Lesson::create([
            'course_id'   => $pianoCourse->id,
            'title'       => 'Advanced Chord Voicings',
            'description' => 'Explore rich chord voicings used in jazz and modern music.',
            'video_url'   => null,
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $pianoCourse->id,
            'title'       => 'Improvisation Concepts',
            'description' => 'Learn scales and patterns for improvisation.',
            'video_url'   => null,
            'order'       => 2,
        ]);

        // ==========================
        // DEMO USER ENROLL
        // ==========================
        $demoUser = User::where('email', 'user@melore.com')->first();
        if ($demoUser && !$demoUser->courses()->where('course_id', $guitarCourse->id)->exists()) {
            $demoUser->courses()->attach($guitarCourse->id);
        }
    }
}
