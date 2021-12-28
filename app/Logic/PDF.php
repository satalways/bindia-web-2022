<?php

namespace App\Logic;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class PDF extends \mikehaertl\wkhtmlto\Pdf
{
    public function __construct()
    {
        parent::__construct();

        if (localhost()) {
            $this->binary = env('WKHTML_PDF_BINARY', 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe');
        } else {
            $this->binary = env('WKHTML_PDF_BINARY', 'wkhtmltopdf');
        }
    }

    /**
     * @return array
     *
     * It returns options for WkHTML
     */
    protected static function options(): array
    {
        $wkHtmlOptions = [
            'no-outline',         // Make Chrome not complain
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'page-size' => 'legal',

            // Default page options
            'disable-smart-shrinking',
            //'user-style-sheet' => ROOT_PATH . 'conf/files/pdf/pdf.css',
            'ignoreWarnings' => true,
            'encoding' => 'UTF-8'
        ];

        return $wkHtmlOptions;
    }


    /**
     * @param        $html
     * @param string $output_file
     * @param array $options
     *
     * @return bool|string
     *
     * This method gets HTML, generates a PDF file and returns created PDF file path.
     * It will return false if PDF file is not generated.
     */
    public static function create_pdf_file_from_html($html, string $output_file = '', array $options = [])
    {
        $default = [
            'title' => 'Bindia PDF Document',
            'inline' => false,
            'download' => false
        ];
        $options = set_args($options, $default);
        if (blank($output_file)) {
            Storage::disk('local')->makeDirectory('temp');
            $output_file = tempnam(Storage::path('temp'), 'Bindia_');
        }

        if (is_file($output_file)) {
            @unlink($output_file);
        }

        if (!is_dir(dirname($output_file))) {
            File::makeDirectory(dirname($output_file));
        }

        if (substr(strtolower($output_file), -4) !== '.pdf') {
            $output_file .= '.pdf';
        }

        $pdf = new self(self::options());
        $pdf->addPage($html);

        if ($options['inline']) {
            if (!$pdf->send($output_file, true)) {
                die($pdf->getError());
            }
            exit();
        } else if ($options['download']) {
            if (!$pdf->send(basename($output_file))) {
                die($pdf->getError());
            }
            exit();
        } else {
            $pdf->saveAs($output_file);
        }

        if (is_file($output_file)) {
            return $output_file;
        }

        return false;
    }

    public static function create_pdf_file_from_view(string $view, array $viewData = [], string $output_file = '', array $options = [])
    {
        $html = view($view, $viewData)->render();

        return self::create_pdf_file_from_html($html, $output_file, $options);
    }

}
