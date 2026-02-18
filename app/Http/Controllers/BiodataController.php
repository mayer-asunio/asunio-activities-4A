<?php

namespace App\Http\Controllers;

class BiodataController extends Controller
{
    public function index()
    {
        return view('biodata', [
            'photo' => 'images/profile.jpg',
            'name' => 'Jiel Mayer L. Asunio',
            'profession' => 'IT Student',
            'phone' => '09672671205',
            'email' => 'mayerasunio02@gmail.com',
            'linkedin' => 'linkedin.com/in/jielmayerasunio',
            'github' => 'https://github.com/mayer-asunio',
            'address' => 'San Jose San Nicolas Pangasinan, Philippines',
            'dob' => '8 June 2004',
            'age' => 21,
            'gender' => 'Male',
            'nationality' => 'Filipino',
            'summary' => 'An IT student with a strong foundation in programming, web development, 
            and computer systems gained through academic coursework and hands-on projects. Possesses 
            good problem-solving skills, adaptability, and a willingness to learn new technologies. 
            Experienced in working both independently and in team-based activities. Familiar with basic 
            software troubleshooting and system development processes. Motivated to apply technical
            knowledge in real-world IT environments and future professional roles.',
            'education' => [
                [
                    'year' => '2017-2022',
                    'title' => 'High School DIploma',
                    'school' => 'Tayug National High School / PUNP - Tayug Campus',
                    'details' => 'STEM Student'
                ],
                [
                    'year' => '2022-Current',
                    'title' => 'Bachelor of Science in Information Technology',
                    'school' => 'Pangasinan State University - Urdaneta City Campus',
                    'details' => 'Major in Web and Mobile Development'
                ]
                
            ],
            'experience' => [
                [
                    'year' => '2022–Present',
                    'position' => 'College Student',
                    'company' => 'N/A',
                    'tasks' => [
                        'Web and Mobile major'
                    ]
                ]
            ],
            'skills' => [
                'HTML',
                'CSS',
                'C++'
            ]
        ]);
    }
}
