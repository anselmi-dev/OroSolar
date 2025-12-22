<?php

namespace App\Services;

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;
use Illuminate\Support\Facades\Log;

class GoogleSheetsService
{
    protected Sheets $sheets;

    protected string $spreadsheetId;

    protected string $range;

    public function __construct()
    {
        $this->spreadsheetId = config('services.google.sheets.spreadsheet_id');

        $this->range = config('services.google.sheets.range');

        $credentialsPath = config('services.google.sheets.credentials_path');

        // Convertir ruta relativa a absoluta si es necesario
        if (!str_starts_with($credentialsPath, '/')) {
            $credentialsPath = storage_path($credentialsPath);
        }

        // Verificar que el archivo existe
        if (!file_exists($credentialsPath)) {
            throw new \RuntimeException(
                "El archivo de credenciales de Google no existe en: {$credentialsPath}. " .
                "Por favor, descarga el archivo JSON de Service Account desde Google Cloud Console " .
                "y guárdalo en storage/app/google-credentials.json"
            );
        }

        $client = new Client();

        $client->setApplicationName(config('app.name'));

        $client->setScopes(Sheets::SPREADSHEETS);

        $client->setAuthConfig($credentialsPath);

        $this->sheets = new Sheets($client);
    }

    /**
     * Agregar una fila a la hoja de cálculo
     */
    public function appendRow(array $rowData): void
    {
        try {
            $valueRange = new ValueRange();

            $valueRange->setValues([
                $rowData
            ]);

            logger($this->range);

            $this->sheets->spreadsheets_values->append(
                $this->spreadsheetId,
                $this->range,
                $valueRange,
                [
                    'valueInputOption' => 'RAW',
                    'insertDataOption' => 'INSERT_ROWS',
                ]
            );
        } catch (\Exception $e) {

            Log::error('Google Sheets appendRow error', [
                'error' => $e->getMessage(),
                'row_data' => $rowData,
            ]);

            throw $e;
        }
    }

    /**
     * Obtener todas las filas de la hoja
     */
    public function getRows(): array
    {
        $response = $this->sheets->spreadsheets_values->get(
            $this->spreadsheetId,
            $this->range
        );

        return $response->getValues() ?? [];
    }
}

