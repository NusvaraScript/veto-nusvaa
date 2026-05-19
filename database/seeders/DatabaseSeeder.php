<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vice;
use App\Models\Relapse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ──────────────────────────────────────────────
        // 1. ADMIN USER
        // ──────────────────────────────────────────────
        $admin = User::create([
            'name'     => 'Admin VetoNusvaa',
            'email'    => 'admin@vetonusvaa.com',
            'password' => 'password',
            'role'     => 'admin',
        ]);

        // ──────────────────────────────────────────────
        // 2. REGULAR USERS (10 user)
        // ──────────────────────────────────────────────
        $users = collect();

        $userList = [
            ['name' => 'Budi Santoso',    'email' => 'budi@mail.com'],
            ['name' => 'Siti Nurhaliza',  'email' => 'siti@mail.com'],
            ['name' => 'Andi Pratama',    'email' => 'andi@mail.com'],
            ['name' => 'Dewi Lestari',    'email' => 'dewi@mail.com'],
            ['name' => 'Rizki Ramadhan',  'email' => 'rizki@mail.com'],
            ['name' => 'Putri Ayu',       'email' => 'putri@mail.com'],
            ['name' => 'Fajar Hidayat',   'email' => 'fajar@mail.com'],
            ['name' => 'Nisa Amalia',     'email' => 'nisa@mail.com'],
            ['name' => 'Yoga Aditya',     'email' => 'yoga@mail.com'],
            ['name' => 'Laila Fitri',     'email' => 'laila@mail.com'],
        ];

        foreach ($userList as $u) {
            $users->push(User::create([
                'name'     => $u['name'],
                'email'    => $u['email'],
                'password' => 'password',
                'role'     => 'user',
            ]));
        }

        // ──────────────────────────────────────────────
        // 3. VICES (kebiasaan buruk) — beragam per user
        // ──────────────────────────────────────────────
        $viceTemplates = [
            // Severity: rendah
            ['habit_name' => 'Scroll Media Sosial',       'description' => 'Kebiasaan scrolling tanpa tujuan di Instagram/TikTok.',              'severity' => 'rendah'],
            ['habit_name' => 'Ngemil Larut Malam',        'description' => 'Makan snack tidak sehat setelah jam 10 malam.',                      'severity' => 'rendah'],
            ['habit_name' => 'Menunda Tidur',             'description' => 'Tidur lewat dari jam 12 malam tanpa alasan produktif.',              'severity' => 'rendah'],
            ['habit_name' => 'Belanja Impulsif Online',   'description' => 'Membeli barang yang tidak dibutuhkan saat diskon.',                  'severity' => 'rendah'],

            // Severity: sedang
            ['habit_name' => 'Prokrastinasi Tugas',       'description' => 'Menunda-nunda pekerjaan penting hingga deadline mepet.',             'severity' => 'sedang'],
            ['habit_name' => 'Begadang Gaming',           'description' => 'Main game online sampai subuh hingga mengganggu aktivitas.',         'severity' => 'sedang'],
            ['habit_name' => 'Makan Junk Food',           'description' => 'Konsumsi makanan cepat saji lebih dari 3x seminggu.',                'severity' => 'sedang'],
            ['habit_name' => 'Skip Olahraga',             'description' => 'Melewatkan jadwal olahraga yang sudah direncanakan.',                'severity' => 'sedang'],
            ['habit_name' => 'Overthinking',              'description' => 'Terlalu banyak berpikir negatif yang tidak produktif.',               'severity' => 'sedang'],

            // Severity: tinggi
            ['habit_name' => 'Merokok',                   'description' => 'Kebiasaan merokok yang sulit dihentikan.',                           'severity' => 'tinggi'],
            ['habit_name' => 'Bolos Kuliah',              'description' => 'Tidak masuk perkuliahan tanpa alasan yang jelas.',                   'severity' => 'tinggi'],
            ['habit_name' => 'Kecanduan Kafein Berlebih', 'description' => 'Minum kopi lebih dari 5 cup per hari.',                              'severity' => 'tinggi'],
        ];

        $excuses = [
            'Lagi stres berat, butuh pelarian.',
            'Temen-temen pada ngajak, gak enak nolak.',
            'Gabut seharian, gak ada kegiatan.',
            'Mood lagi jelek banget hari ini.',
            'Udah capek, gak kuat nahan lagi.',
            'Cuma sekali aja, besok berhenti.',
            'Lupa kalau lagi pantang.',
            'Kebiasaan otomatis, gak sadar.',
            'Reward diri sendiri setelah kerja keras.',
            'Pengaruh lingkungan sekitar.',
            'Kurang tidur, jadi gak fokus.',
            'Lagi ada masalah keluarga.',
            'Deadline menumpuk, butuh coping.',
            'Weekend santai, jadi lengah.',
            'Cuaca mendukung buat relapse.',
        ];

        $now = Carbon::now();

        foreach ($users as $user) {
            // Setiap user punya 2-5 kebiasaan buruk secara acak
            $selectedVices = collect($viceTemplates)->shuffle()->take(rand(2, 5));

            foreach ($selectedVices as $vt) {
                // Buat streak_days acak: rendah = streak tinggi, tinggi = streak rendah
                $streakRange = match ($vt['severity']) {
                    'rendah' => [10, 60],
                    'sedang' => [3, 30],
                    'tinggi' => [0, 14],
                };

                $vice = Vice::create([
                    'user_id'     => $user->id,
                    'habit_name'  => $vt['habit_name'],
                    'description' => $vt['description'],
                    'severity'    => $vt['severity'],
                    'streak_days' => rand($streakRange[0], $streakRange[1]),
                ]);

                // ──────────────────────────────────────────────
                // 4. RELAPSES — 0 sampai 6 relapse per vice
                // ──────────────────────────────────────────────
                $relapseCount = rand(0, 6);

                for ($i = 0; $i < $relapseCount; $i++) {
                    // Tanggal relapse acak dalam 90 hari terakhir
                    $violationDate = $now->copy()->subDays(rand(1, 90))->format('Y-m-d');

                    Relapse::create([
                        'vices_id'       => $vice->id,
                        'violation_date' => $violationDate,
                        'excuse'         => $excuses[array_rand($excuses)],
                    ]);
                }
            }
        }

        $this->command->info('');
        $this->command->info('╔══════════════════════════════════════╗');
        $this->command->info('║   ✅  SEEDER BERHASIL DIJALANKAN     ║');
        $this->command->info('╠══════════════════════════════════════╣');
        $this->command->info('║  👤 1 Admin    : admin@vetonusvaa.com║');
        $this->command->info('║  👥 10 Users   : password = password ║');
        $this->command->info('║  🚫 Vices      : 2-5 per user        ║');
        $this->command->info('║  💀 Relapses   : 0-6 per vice        ║');
        $this->command->info('╚══════════════════════════════════════╝');
        $this->command->info('');
    }
}
