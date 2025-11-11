<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Produk;

class CrudFeatureTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    protected $user;
    protected $testProduk;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        // Create test user for login
        $this->user = User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        
        // Create some test products for read, update, and delete tests
        $this->testProduk = Produk::factory()->create([
            'nama' => 'Laptop Test Dusk',
            'harga' => 15000000,
        ]);
    }

    /**
     * Test 1: Login Test (10 poin)
     * Menguji bahwa user dapat login dengan email dan password yang benar.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Masuk ke Akun Anda')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Masuk ke Sistem')
                    ->waitForLocation('/dashboard')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Selamat Datang, Test Admin!')
                    ->assertSee('Dashboard');
        });
    }

    /**
     * Test 2: Create Data Test (10 poin)
     * Menguji bahwa data baru dapat ditambahkan melalui form create.
     */
    public function testCreateData(): void
    {
        $this->browse(function (Browser $browser) {
            // Login first
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Masuk ke Sistem')
                    ->waitForLocation('/dashboard');
            
            // Navigate to create product page
            $browser->visit('/produk/create')
                    ->assertSee('Tambah Produk Baru')
                    ->type('nama', 'Mouse Gaming Dusk Test')
                    ->type('harga', '450000')
                    ->pause(500)
                    ->press('SIMPAN PRODUK')
                    ->waitForLocation('/produk')
                    ->pause(1000)
                    ->assertSee('Mouse Gaming Dusk Test')
                    ->assertSee('Rp 450.000');
        });
    }

    /**
     * Test 3: Read Data Test (10 poin)
     * Menguji bahwa data yang baru ditambahkan muncul di halaman index.
     */
    public function testReadData(): void
    {
        $this->browse(function (Browser $browser) {
            // Login first
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Masuk ke Sistem')
                    ->waitForLocation('/dashboard');
            
            // Navigate to products index page
            $browser->visit('/produk')
                    ->assertSee('Manajemen Produk')
                    ->assertSee('Laptop Test Dusk')
                    ->assertSee('Rp 15.000.000')
                    ->assertSee('Edit')
                    ->assertSee('Hapus');
        });
    }

    /**
     * Test 4: Update Data Test (10 poin)
     * Menguji bahwa data dapat diperbarui melalui form edit.
     */
    public function testUpdateData(): void
    {
        $this->browse(function (Browser $browser) {
            // Login first
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Masuk ke Sistem')
                    ->waitForLocation('/dashboard');
            
            // Navigate to edit product page
            $browser->visit('/produk/' . $this->testProduk->id . '/edit')
                    ->assertSee('Edit Produk')
                    ->assertInputValue('nama', 'Laptop Test Dusk')
                    ->clear('nama')
                    ->type('nama', 'Laptop Gaming Updated Dusk')
                    ->clear('harga')
                    ->type('harga', '18000000')
                    ->pause(500)
                    ->press('UPDATE PRODUK')
                    ->waitForLocation('/produk')
                    ->pause(1000)
                    ->assertSee('Laptop Gaming Updated Dusk')
                    ->assertSee('Rp 18.000.000');
        });
    }

    /**
     * Test 5: Delete Data Test (10 poin)
     * Menguji bahwa data dapat dihapus melalui tombol delete.
     */
    public function testDeleteData(): void
    {
        $this->browse(function (Browser $browser) {
            // Login first
            $browser->visit('/login')
                    ->type('email', 'admin@example.com')
                    ->type('password', 'password')
                    ->press('Masuk ke Sistem')
                    ->waitForLocation('/dashboard');
            
            // Navigate to products page and delete the test product
            $browser->visit('/produk')
                    ->assertSee('Laptop Test Dusk')
                    ->press('[dusk="delete-button-' . $this->testProduk->id . '"]')
                    ->acceptDialog()
                    ->waitUntilMissing('.loading', 5)
                    ->pause(1000)
                    ->assertDontSee('Laptop Test Dusk');
        });
    }

}
