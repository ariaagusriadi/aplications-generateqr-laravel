<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class GenerateQrController extends Controller
{
    public function index()
    {
        return view('qr.index');
    }
    public function generate(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'Keperluan' => 'required',
            'tanggal' => 'required',
            'logo' => 'required',
        ]);

        $data = "
        Memberikan pengesahan ke :
        nama        : " . request('nama') . "
        Keperluan   : " . request('Keperluan') . "
        tanggal     : " . request('tanggal');

        $filenama = request('nama') .".png";
        $lobol = request('nama');
        $icon = request()->file('logo');

        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($data)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create($icon)
            ->setResizeToWidth(100);

        // Create generic label
        $label = Label::create($lobol)
            ->setTextColor(new Color(0, 0, 0));

        $result = $writer->write($qrCode, $logo, $label);


        // Save it to a file
        $result->saveToFile(public_path("asset/$filenama"));

        $response = response()->download(public_path("asset/$filenama"));
        ob_clean();
        return $response->deleteFileAfterSend();
    }
}
