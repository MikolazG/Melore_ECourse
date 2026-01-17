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
        $guitarCourse = Course::updateOrCreate(
            ['slug' => 'guitar-beginner-essentials'],
            [
                'title'         => 'Guitar Beginner Essentials',
                'category'      => 'Guitar',
                'level'         => 'Beginner',
                'description'   => 'Start your guitar journey from zero. Learn chords, strumming patterns, and basic songs.',
                'price'         => 49000,
                'thumbnail_url' => 'https://media.istockphoto.com/id/2160438355/photo/teacher-and-students-playing-guitar-together-during-music-lesson.jpg?s=612x612&w=0&k=20&c=xlzhBAQ5xibH3rOaXuQPnQwuruWli-LzOwGtuFOIS_4=',
                'video_url'     => 'https://www.youtube.com/embed/5a2w3UuN7Yk',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $guitarCourse->id, 'order' => 1],
            [
                'title'       => 'Introduction to the Guitar',
                'description' => 'Get to know the parts of the guitar and how to hold it correctly.',
                'video_url'   => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $guitarCourse->id, 'order' => 2],
            [
                'title'       => 'Basic Chords: C, G, Am, F',
                'description' => 'Learn your first essential chords.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $guitarCourse->id, 'order' => 3],
            [
                'title'       => 'Strumming Patterns for Beginners',
                'description' => 'Simple strumming techniques to play your first songs.',
                'video_url'   => null,
            ]
        );

        // ✅ FIXED HERE (price harus ada)
        $pianoCourse = Course::updateOrCreate(
            ['slug' => 'advanced-piano-techniques'],
            [
                'title'         => 'Advanced Piano Techniques',
                'category'      => 'Piano',
                'level'         => 'Advanced',
                'description'   => 'Enhance your piano playing with advanced techniques, voicings, and improvisation.',
                'price'         => 99000, // <--- ini yang kurang, bebas lu mau berapa
                'thumbnail_url' => 'https://media.gettyimages.com/id/2120944596/video/piano-teacher-and-student-in-a-home.jpg?s=640x640&k=20&c=iMlfyIRJ7To8K-77M6ba4YjA-FCHBBib0bf8xihWxU4=',
                'video_url'     => 'https://www.youtube.com/embed/9bZkp7q19f0',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $pianoCourse->id, 'order' => 1],
            [
                'title'       => 'Advanced Chord Voicings',
                'description' => 'Explore rich chord voicings used in jazz and modern music.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $pianoCourse->id, 'order' => 2],
            [
                'title'       => 'Improvisation Concepts',
                'description' => 'Learn scales and patterns for improvisation.',
                'video_url'   => null,
            ]
        );

        $vocalCourse = Course::updateOrCreate(
            ['slug' => 'vocal-fundamentals'],
            [
                'title'         => 'Vocal Fundamentals',
                'category'      => 'Vocal',
                'level'         => 'Beginner',
                'description'   => 'Learn the fundamentals of singing including breathing, pitch control, and vocal health.',
                'price'         => 59000,
                'thumbnail_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTL9IZ0MF07mxdOU-jMQaRKgkVOqhnupGd0xZ1_JsJky9kTESNdcBAVz6lRTXaczWXPtdE&usqp=CAU',
                'video_url'     => 'https://www.youtube.com/embed/3ZrZs9zZ6zY',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $vocalCourse->id, 'order' => 1],
            [
                'title'       => 'Breathing Technique for Singers',
                'description' => 'Learn proper breathing to support your voice.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $vocalCourse->id, 'order' => 2],
            [
                'title'       => 'Pitch & Intonation',
                'description' => 'Train your ears and voice to stay on pitch.',
                'video_url'   => null,
            ]
        );

        $drumCourse1 = Course::updateOrCreate(
            ['slug' => 'drum-basics-for-beginners'],
            [
                'title'         => 'Drum Basics for Beginners',
                'category'      => 'Drum',
                'level'         => 'Beginner',
                'description'   => 'Learn basic drum setup, grip, and simple grooves.',
                'price'         => 65000,
                'thumbnail_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSXGmFFURXJ0Q4SOzhQSXx7LwsBSfCuC1xMaQjIm4fvfdYDZSbAY9aLkPr3C-KldhMrVOM&usqp=CAU',
                'video_url'     => 'https://www.youtube.com/embed/2YllipGl2Is',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $drumCourse1->id, 'order' => 1],
            [
                'title'       => 'Drum Kit Setup & Grip',
                'description' => 'Understand the drum kit and how to hold sticks correctly.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $drumCourse1->id, 'order' => 2],
            [
                'title'       => 'Basic Rock Groove',
                'description' => 'Play your first drum groove.',
                'video_url'   => null,
            ]
        );

        $drumCourse2 = Course::updateOrCreate(
            ['slug' => 'intermediate-drum-grooves'],
            [
                'title'         => 'Intermediate Drum Grooves',
                'category'      => 'Drum',
                'level'         => 'Intermediate',
                'description'   => 'Expand your groove vocabulary with fills and variations.',
                'price'         => 85000,
                'thumbnail_url' => 'https://images.pexels.com/photos/8412428/pexels-photo-8412428.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
                'video_url'     => 'https://www.youtube.com/embed/oHg5SJYRHA0',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $drumCourse2->id, 'order' => 1],
            [
                'title'       => 'Drum Fills & Transitions',
                'description' => 'Learn smooth fills between sections.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $drumCourse2->id, 'order' => 2],
            [
                'title'       => 'Groove Variations',
                'description' => 'Add dynamics and variations to your playing.',
                'video_url'   => null,
            ]
        );

        $pianoCourse2 = Course::updateOrCreate(
            ['slug' => 'piano-for-beginners'],
            [
                'title'         => 'Piano for Beginners',
                'category'      => 'Piano',
                'level'         => 'Beginner',
                'description'   => 'Learn piano from scratch: keys, posture, and basic melodies.',
                'price'         => 55000,
                'thumbnail_url' => 'https://media.gettyimages.com/id/1312612232/video/happy-asian-mature-couple-enjoy-singing-and-playing-piano-together-in-living-room-at-home.jpg?s=640x640&k=20&c=hpOOXs2icalJHTw2YEx2BNapbrazUKOCbABricUrCXk=',
                'video_url'     => 'https://www.youtube.com/embed/fJ9rUzIMcZQ',
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $pianoCourse2->id, 'order' => 1],
            [
                'title'       => 'Introduction to Piano Keys',
                'description' => 'Get familiar with white and black keys.',
                'video_url'   => null,
            ]
        );

        Lesson::updateOrCreate(
            ['course_id' => $pianoCourse2->id, 'order' => 2],
            [
                'title'       => 'Playing Simple Melodies',
                'description' => 'Play your first simple songs.',
                'video_url'   => null,
            ]
        );

        // attach demo user to 1 course
        $demoUser = User::where('email', 'user@melore.com')->first();
        if ($demoUser && !$demoUser->courses()->where('course_id', $guitarCourse->id)->exists()) {
            $demoUser->courses()->attach($guitarCourse->id);
        }
    }
}
