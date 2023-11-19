<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $questions = [
            [
                 'id' => 1,
                 'question' => "What is the Full Form Of RAM?",
                 'answer' => "Random Access Memory",
                 'options' => [
                     "Run Accept Memory",
                     "Random All Memory",
                     "Random Access Memory",
                     "None of these"
                     ]
            ],
            [
                 'id' => 2,
                 'question' => "What is the Full-Form of CPU?",
                 'answer' => "Central Processing Unit",
                 'options' => [
                     "Central Program Unit",
                     "Central Processing Unit",
                     "Central Preload Unit",
                     "None of these"
                 ]
             ],
            [
                 'id' => 3,
                 'question' => "What is the Full-Form of E-mail",
                 'answer' => "Electronic Mail",
                 'options' => [
                     "Electronic Mail",
                     "Electric Mail",
                     "Engine Mail",
                     "None of these"
                 ]
             ],
            [
                 'id' => 4,
                 'question' => "'DB' in computer means?",
                 'answer' => "DataBase",
                 'options' => [
                     "Double Byte",
                     "Data Block",
                     "DataBase",
                     "None of these"
                 ]
             ],
            [
                 'id' => 5,
                 'question' => "What is FMD?",
                 'answer' => "Fluorescent Multi-Layer Disc",
                 'options' => [
                     "Fluorescent Multi-Layer Disc",
                     "Flash Media Driver",
                     "Fast-Ethernet Measuring Device",
                     "None of these"
                 ]
             ],
            [
                 'id' => 6,
                 'question' => "How many bits is a byte?",
                 'answer' => "8",
                 'options' => [
                     "32",
                     "16",
                     "8",
                     "64"
                 ]
             ],
            [
                 'id' => 7,
                 'question' => "A JPG stands for :",
                 'answer' => "A format for an image file",
                 'options' => [
                     "A format for an image file",
                     "A Jumper Programmed Graphic",
                     "A type of hard disk",
                     "A unit of measure for memory"
                 ]
             ],
            [
                 'id' => 8,
                 'question' => "Which was an early mainframe computer?",
                 'answer' => "ENIAC",
                 'options' => [
                     "ENIAC",
                     "EDVAC",
                     "UNIC",
                     "ABACUS"
                 ]
             ],
            [
                 'id' => 9,
                 'question' => "Main circuit board in a computer is :",
                 'answer' => "Mother board",
                 'options' => [
                     "Harddisk",
                     "Mother board",
                     "Microprocessor",
                     "None of these"
                 ]
             ],
            [
                 'id' => 10,
                 'question' => "ISP stands for :",
                 'answer' => "Internet Service Prov'id'er",
                 'options' => [
                     "Internet Survey Period",
                     "Integreted Service Prov'id'er",
                     "Internet Security Protocol",
                     "Internet Service Prov'id'er"
                 ]
             ],
         ];
                for ($i=1; $i <= 4 ; $i++) {
                    # code...
                    foreach ($questions as $questionData) {
                        DB::table('questions')->insert([
                            'sector_id' => $i,
                            'question' => $questionData['question'],
                            'answer' => $questionData['answer'],
                            'options'=> json_encode($questionData['options'])
                        ]);
                    }
                }

    }
}
