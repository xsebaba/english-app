<?php

namespace Database\Seeders;
use \App\Models\User;
use \App\Models\Answer;
use \App\Models\Course;
use \App\Models\Level;
use \App\Models\Question;
use \App\Models\Subject;
use \App\Models\Test;
use \App\Models\Lesson;
use Illuminate\Support\Facades\Hash;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::create([
            'name' => 'pedzel',
            'email' => 'pedzel@test.com',
            'password' => Hash::make('qwerty1234')
        ]);
        
        Level::create([
            'grade'=> 'A1'
        ]);

        Subject::create([
            'subject_name' => 'Gramatyka', 
        ]);
        Subject::create([
            'subject_name' => 'Fonetyka',
        ]);


        Course::create([
            'course_name' =>"Gramatyka dla początkujących",
            'subject_id' => 1,
            'course_slug' => "gramatyka-dla-poczatkujacych"
        ]);

        Course::create([
            'course_name' =>"Gramatyka średniozaawansowana",
            'course_description' => "Jeśli posiadasz już podstawową wiedzę z zakresu gramatyki. Znasz czasy teraźniejsze i umiesz powiedzieć coś w czasie przeszłym to pora rozwinąć swoje umiejętności.",
            'subject_id' => 1,
            'course_slug' => "gramatyka-sredniozaawansowana"
        ]);

        Course::create([
            'course_name' =>"Gramatyka zaawansowana",
            'subject_id' => 1,
            'course_slug' => 'gramatyka-zaawansowana'
        ]);

        Course::create([
            'course_name' =>"Poprawna wymowa",
            'subject_id' => 1,
            'course_description' => "Naucz się poprawnej wymowy z amerykańskim akcentem i mów tak, aby cię zrozumiano",
            'course_slug' => "poprawna-wymowa"
        ]);

        Test::create([
            'test_name' => "Initial test",
            'course_id' => 1
        ]);

        $questions = [
            [
                'question' => 'How ____ sisters do you have?',
                'correct_answer' => 'many',
                'test_id'=> 1,
                'answers' => json_encode(['much', 'many', 'older', 'younger', 'old']),
            ],
            [
                'question' => 'What time is it?',
                'correct_answer' => 'It is half past ten.',
                'test_id'=> 1,
                'answers' 
                => json_encode(['It is eleven quater.', 'It is quater.', 'It is time.', 'It is half past ten.']),
            ],
            [
                'question' => 'What do you do?',
                'correct_answer' => 'I am a doctor.',
                'test_id'=> 1,
                'answers' => json_encode(['I am doctor.', 'I am studying.', 'I am a doctor.', 'I am driving a car.']),
            ],
            [
                'question' => 'Where ___ you ___ this t-shirt.',
                'correct_answer' => 'did/buy',
                'test_id'=> 1,
                'answers' => json_encode(['did/bought', 'do/buy', 'did/buy','have/buy', 'did not/bought']),
            ],
            [
                'question' => 'Who wrote the play "Romeo and Juliet"?',
                'correct_answer' => 'William Shakespeare',
                'test_id'=> 1,
                'answers' => json_encode(['Arthur Miller', 'Tennessee Williams', 'William Shakespeare', 'Samuel Beckett']),
            ],
            [
                'question' => 'Who wrote the play "Romeo and Juliet"?',
                'correct_answer' => 'William Shakespeare',
                'test_id'=> 1,
                'answers' => json_encode(['Arthur Miller', 'Tennessee Williams', 'William Shakespeare', 'Samuel Beckett']),
            ],
        ];
        foreach ($questions as $questionData) {
            Question::create($questionData);
        };

        $lessons = [
            [
                'lesson_name' => "Do or make?",
                'lesson_slug' => "do-or-make",
                'lesson_body' => 
                    '<article>
                    <p> Zarówno <b>do</b> jak i <b>make</b> można przetłumaczyć na język polski jako czasownik <b>robić</b>. Różnica między tymi wyrażeniami dotyczy sposobu w jaki są one używane. Nie są to bowiem synonomi, które dowolnie zastępujemy</p>
                    <p> Teoretycznie <b>do</b> jest bardziej ogólnym terminem, który odnosi się do wykonywania, czynności, aktywności lub zadań, natomiast <b>make</b> koncentruje się na procesie tworzenia, konstrukcji. Niestety takie wyjaśnienie niestety nie wystarczy i jeśli chcemy poprawnie nauczyć się używać oba czasowniki, wówczas najlepiej jest nauczyć się na pamięć sytuacji podczas których z nich korzystamy.</p>
                    <p>"I need to <b>do my homework.</b>" <i>Muszę zrobić swoją pracę domową.</i></p>
                    <p>"She <b>does her best </b>in every competition." <i>Ona daje z siebie wszystko podczas każdej rywalizacji. Zauważ, że w tym przypadku nie użyliśmy klasycznego <b>do</d> lecz formy tego czasownika występującej z trzecią osobą liczby pojedynczej <b> does</b></i></p>
                    <p>"We have a lot of work to do." <i>Mamy wiele pracy do zrobienia.</i></p>
                    <p>"He <b>does the dishes</b> after dinner." <i>On zmywa naczynia po kolacji.</i></p>
                    <p>"They <b>did a great job</b> on the presentation." <i>Sporządzili świetną prezentację.</i></p>
                    <p>"I <b>did some shopping</b> at the mall." <i>Zrobiłem zakupy w centrum handlowym.</i></p>
                    <p>"Let\'s <b>do some exercises </b> to stay fit." <i>Zróbmy trochę ćwiczeń, żeby być w formie.</i></p>
                    <p>"She\'s <b>doing her hair</b> for the party." <i>Ona układa włosy na imprezę.</i></p>
                    <p> "They <b>do their best </b>to make the event successful." <i>Oni dają z siebie wszystko, żeby wydarzenie było udane.</i></p>
                   <p> "The mechanic will do the repairs on your car." <i>Mechanik przeprowadzi naprawy w twoim samochodzie.</i></p>
                    </article>',
                'course_id' => 2,
                'lesson_description' => "Z tej lekcji dowiesz się jakie są różnice między sformułowaniem <b>make</b> i <b>do</b>."
            ],
            [
                'lesson_name' => "Present Continuous - co musisz wiedzieć o czasie teraźniejszym ciągłym",
                'lesson_slug'=>"present-continuous-to-proste",
                'course_id' => 2,
                'lesson_description' => " W tej lekcji poznasz podstawy czasu teraźniejszego ciągłego Present Continuous i nauczysz się tworzyć zdania w tym czasie",
                'lesson_body'=> '
                    <article>
                        <p>Czas teraźniejszy ciągły (Present Continuous) w języku angielskim opisuje działania lub wydarzenia, które dzieją się w chwili obecnej, w momencie mówienia, lub w okolicach tego czasu. Czas ten jest tworzony przy użyciu odpowiedniego formantu czasownika "to be" (am, is, are) oraz formy bazowej czasownika głównego z dodanym końcówką "-ing".</p>
                        <p>Tego czasu użyjemy, kiedy ktoś nas zapyta o to co robimy. Możemy wtedy odpowiedzieć <b>I am learning English</b> co oznacza <b> Uczę się języka angielskiego</b>. Tego typu czas nie występuje w języku polskim, co może nieco utrudniać jego zrozumienie, jednak on wcale nie jest taki trudny</p>
                        <p>Aby zbudować zdanie z użyciem Present Continuous musisz nauczyć się (na pamięć) odmiany czasownika <b>być</b> czyli <b> to be</b>. Może przypomisz sobie rozmowę ojca z synem z filmu "Dzień świra" podczas której młody ma problem z odmianą czasownika być? Jeśli nie, to obejrzyj koniecznie ten film!</p>
                        <div class="p-4">
                            <table class="border-collapse border border-black w-full">
                                <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-2">Osoba</th>
                                    <th class="p-2">Odmiana</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="p-2">I (ja)</td>
                                    <td class="p-2">am (jestem)</td>
                                </tr>
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="p-2">You (ty)</td>
                                    <td class="p-2">are (jesteś)</td>
                                </tr>
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="p-2">He/She/It (on/ona/ono)</td>
                                    <td class="p-2">is (są)</td>
                                </tr>
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="p-2">We (my)</td>
                                    <td class="p-2">are (jesteśmy)</td>
                                </tr>
                                <tr class="hover:bg-gray-100 transition-colors">
                                    <td class="p-2">They (oni/one)</td>
                                    <td class="p-2">are (są)</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Nauka tej tabelki na prawdę nie jest trudna i jeśli będziesz próbować tworzyć zdania w tym czasie to na pewno bardzo szybko nauczysz się odmiany tego czasownika</p>
                        <p>Teraz spróbujmy utworzyć kilka zdań w języku angielskim. Pomoże nam w tym pewien schemat. Aby ułożyć proste zdanie wystarczy określić podmiot(czyli osobę która ma to zdanie wypowiedzieć). Następnie zgodnie z tabelka wybrać odpowiednią formę czasownika <b>to be</b> i czasownik do którego dodajemy końcówkę <b>ing</b>. 
                        <div class="p-4">
                        <table class="border-collapse border border-black w-full">
                            <thead>
                            <tr class="bg-gray-200">
                                <th class="p-2">Podmiot</th>
                                <th class="p-2">To be (odpowiedni odmienione)</th>
                                <th class="p-2">Czasownik z końcówką ing</th>
                                <th class="p-2">Tłumaczenie</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="p-2">I </td>
                                <td class="p-2">am </td>
                                <td class="p-2"> learn<b>ing</b></td>
                                <td class="p-2">Uczę się </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="p-2">You </td>
                                <td class="p-2">are </td>
                                <td class="p-2">go<b>ing</b> to the cinema </td>
                                <td class="p-2">Ty idziesz do kina </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="p-2">He(on)</td>
                                <td class="p-2">is </td>
                                <td class="p-2">eat<b>ing</b> </td>
                                <td class="p-2">On je</td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="p-2">We </td>
                                <td class="p-2">are </td>
                                <td class="p-2">wait<b>ing</b></td>
                                <td class="p-2">My czekamy </td>
                            </tr>
                            <tr class="hover:bg-gray-100 transition-colors">
                                <td class="p-2">They</td>
                                <td class="p-2">are </td>
                                <td class="p-2">danc<b>ing</b> </td>
                                <td class="p-2">Oni tańczą</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <p> W czasie <b>Present Continuous</b> tworzymy zaprzeczenia poprzez dodanie negacji <b>not</b>.</p>
                    <p> Tom is <b>not</b> working. - Tom nie pracuje </p>
                    <p> I am <b> not </b> learning English - Nie uczę się języka angielskiego </p> 
                    <p>Myślę, że jeśli umiesz stworzyć już proste zdanie, to z pewnością będziesz w stanie poradzić sobie z zaprzeczeniem.</p>
                    <p>Ostatnią rzeczą z którą chciałbym się z Tobą podzielić to tworzenie zapytań.</p>
                    <p>To jest całkiem proste. Aby stworzyć pytanie wystarczy zamienić kolejność podmiotu (I/yoy/he/she/it/we) i czasownika <b>to be</b> w zdaniu. </p>
                    <p><b>Are you</b> learning English - Czy ty uczysz się angielskiego?</p>
                    <p>Na powyższe pytanie można odpowiedzieć <b>Yes I am</b> - Tak uczę, lub pełnym zdaniem <b> Yes I am learning English </b></p>
                    </article>'
            ],    
        ];
        foreach ($lessons as $lesson) {
                Lesson::create($lesson);
        };
    }
};