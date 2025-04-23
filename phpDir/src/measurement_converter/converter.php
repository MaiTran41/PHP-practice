<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conversion_type = $_POST['conversion_type'] ?? '';
    $result = null;
    $from_value = null;
    $from_unit = '';
    $to_unit = '';

    if ($conversion_type === 'temperature') {
        $temperature_conversion = $_POST['temperature_conversion'] ?? '';
        $temperature_value = floatval($_POST['temperature_value'] ?? 0);
        $from_value = $temperature_value;

        if ($temperature_conversion === 'celsius_to_fahrenheit') {
            $result = celsiusToFahrenheit($temperature_value);
            $from_unit = '°C';
            $to_unit = '°F';
        } elseif ($temperature_conversion === 'celsius_to_kelvin') {
            $result = celsiusToKelvin($temperature_value);
            $from_unit = '°C';
            $to_unit = 'K';
        }
    } elseif ($conversion_type === 'speed') {
        $speed_conversion = $_POST['speed_conversion'] ?? '';
        $speed_value = floatval($_POST['speed_value'] ?? 0);
        $from_value = $speed_value;

        if ($speed_conversion === 'kmh_to_ms') {
            $result = kmhToMs($speed_value);
            $from_unit = 'km/h';
            $to_unit = 'm/s';
        } elseif ($speed_conversion === 'kmh_to_knots') {
            $result = kmhToKnots($speed_value);
            $from_unit = 'km/h';
            $to_unit = 'knots';
        }
    } elseif ($conversion_type === 'mass') {
        $mass_conversion = $_POST['mass_conversion'] ?? '';
        $mass_value = floatval($_POST['mass_value'] ?? 0);
        $from_value = $mass_value;

        if ($mass_conversion === 'kg_to_g') {
            $result = kgToGrams($mass_value);
            $from_unit = 'kg';
            $to_unit = 'g';
        } elseif ($mass_conversion === 'g_to_kg') {
            $result = gramsToKg($mass_value);
            $from_unit = 'g';
            $to_unit = 'kg';
        }
    }

    if ($result !== null) {
        $result = number_format($result, 4);

        header('Content-Type: application/json');
        echo json_encode([
            'result' => $result,
            'from_value' => $from_value,
            'from_unit' => $from_unit,
            'to_unit' => $to_unit,
        ]);
        exit();
    }
}

function celsiusToFahrenheit($celsius)
{
    return ($celsius * 9) / 5 + 32;
}

function celsiusToKelvin($celsius)
{
    return $celsius + 273.15;
}

function kmhToMs($kmh)
{
    return $kmh / 3.6;
}

function kmhToKnots($kmh)
{
    return $kmh / 1.852;
}

function kgToGrams($kg)
{
    return $kg * 1000;
}

function gramsToKg($grams)
{
    return $grams / 1000;
}
