
class Admin_test extends TestCase
{
    private $CI;

    public function setUp(): void
    {
        $this->CI =& get_instance();
        $this->CI->load->model('Model_admin');
        $this->CI->load->library('session');
    }

    public function testTambahResepValidImage()
    {
        // Mock the file upload
        $_FILES['foto'] = [
            'name' => 'test.jpg',
            'type' => 'image/jpeg',
            'tmp_name' => '/tmp/php/php6hst32',
            'error' => 0,
            'size' => 98174
        ];

        // Mock post data
        $_POST = [
            'nama' => 'Test Resep',
            'bahan' => 'Test Bahan',
            'bumbu' => 'Test Bumbu',
            'kesulitan' => 'Mudah',
            'waktu' => '30 menit',
            'kategori' => '1',
            'asal' => 'Indonesia',
            'cara' => 'Test Cara'
        ];

        // Start output buffering to capture redirect
        $this->CI->output->set_header('Location: ' . base_url('admin/resep'));

        $this->CI->tambah_resep();

        // Check for the flash message
        $this->assertContains('Berhasil! menambahkan Resep', $this->CI->session->flashdata('msg'));

        // Verify if the data was inserted correctly
        // Add necessary assertions here to check the database
    }

    public function testTambahResepInvalidImage()
    {
        // Mock the file upload
        $_FILES['foto'] = [
            'name' => 'test.txt',
            'type' => 'text/plain',
            'tmp_name' => '/tmp/php/php6hst32',
            'error' => 0,
            'size' => 98174
        ];

        // Mock post data
        $_POST = [
            'nama' => 'Test Resep',
            'bahan' => 'Test Bahan',
            'bumbu' => 'Test Bumbu',
            'kesulitan' => 'Mudah',
            'waktu' => '30 menit',
            'kategori' => '1',
            'asal' => 'Indonesia',
            'cara' => 'Test Cara'
        ];

        // Call the method
        $this->CI->tambah_resep();

        // Check for the flash message indicating an error
        $this->assertContains('Hanya Boleh foto dengan format gambar', $this->CI->session->flashdata('pesan'));

        // Check if redirected to the correct page
        // Verify the redirect (You might need to adapt based on your framework and setup)
        // Add necessary assertions here to check the redirection
    }

    // Add more tests for other branches and edge cases...
}
