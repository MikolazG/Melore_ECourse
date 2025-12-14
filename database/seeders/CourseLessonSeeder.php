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
        // COURSE 3 — VOCAL
        // ==========================
        $vocalCourse = Course::create([
            'title'         => 'Vocal Fundamentals',
            'slug'          => 'vocal-fundamentals',
            'category'      => 'Vocal',
            'level'         => 'Beginner',
            'description'   => 'Learn the fundamentals of singing including breathing, pitch control, and vocal health.',
            'price'         => 59000, // Rp 59.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Vocal+Fundamentals',
            'video_url'     => 'https://www.youtube.com/embed/3ZrZs9zZ6zY',
        ]);

        Lesson::create([
            'course_id'   => $vocalCourse->id,
            'title'       => 'Breathing Technique for Singers',
            'description' => 'Learn proper breathing to support your voice.',
            'video_url'   => null,
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $vocalCourse->id,
            'title'       => 'Pitch & Intonation',
            'description' => 'Train your ears and voice to stay on pitch.',
            'video_url'   => null,
            'order'       => 2,
        ]);

        // ==========================
        // COURSE 4 — DRUM
        // ==========================
        $drumCourse1 = Course::create([
            'title'         => 'Drum Basics for Beginners',
            'slug'          => 'drum-basics-for-beginners',
            'category'      => 'Drum',
            'level'         => 'Beginner',
            'description'   => 'Learn basic drum setup, grip, and simple grooves.',
            'price'         => 65000, // Rp 65.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Drum+Basics',
            'video_url'     => 'https://www.youtube.com/embed/2YllipGl2Is',
        ]);

        Lesson::create([
            'course_id'   => $drumCourse1->id,
            'title'       => 'Drum Kit Setup & Grip',
            'description' => 'Understand the drum kit and how to hold sticks correctly.',
            'video_url'   => null,
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $drumCourse1->id,
            'title'       => 'Basic Rock Groove',
            'description' => 'Play your first drum groove.',
            'video_url'   => null,
            'order'       => 2,
        ]);

        // ==========================
        // COURSE 5 — DRUM(2)
        // ==========================
        $drumCourse2 = Course::create([
            'title'         => 'Intermediate Drum Grooves',
            'slug'          => 'intermediate-drum-grooves',
            'category'      => 'Drum',
            'level'         => 'Intermediate',
            'description'   => 'Expand your groove vocabulary with fills and variations.',
            'price'         => 85000, // Rp 85.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Drum+Intermediate',
            'video_url'     => 'https://www.youtube.com/embed/oHg5SJYRHA0',
        ]);

        Lesson::create([
            'course_id'   => $drumCourse2->id,
            'title'       => 'Drum Fills & Transitions',
            'description' => 'Learn smooth fills between sections.',
            'video_url'   => null,
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $drumCourse2->id,
            'title'       => 'Groove Variations',
            'description' => 'Add dynamics and variations to your playing.',
            'video_url'   => null,
            'order'       => 2,
        ]);

        // ==========================
        // COURSE 6 — PIANO(2)
        // ==========================
        $pianoCourse2 = Course::create([
            'title'         => 'Piano for Beginners',
            'slug'          => 'piano-for-beginners',
            'category'      => 'Piano',
            'level'         => 'Beginner',
            'description'   => 'Learn piano from scratch: keys, posture, and basic melodies.',
            'price'         => 55000, // Rp 55.000
            'thumbnail_url' => 'https://via.placeholder.com/600x400?text=Piano+Beginner',
            'video_url'     => 'https://www.youtube.com/embed/fJ9rUzIMcZQ',
        ]);

        Lesson::create([
            'course_id'   => $pianoCourse2->id,
            'title'       => 'Introduction to Piano Keys',
            'description' => 'Get familiar with white and black keys.',
            'video_url'   => null,
            'order'       => 1,
        ]);

        Lesson::create([
            'course_id'   => $pianoCourse2->id,
            'title'       => 'Playing Simple Melodies',
            'description' => 'Play your first simple songs.',
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
