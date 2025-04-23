<?php
/**
 * Measurement Converter
 *
 * This script handles conversion between different units of:
 * - Temperature (Celsius, Fahrenheit, Kelvin)
 * - Speed (km/h, m/s, knots)
 * - Mass (kg, g)
 */

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conversion_type = $_POST['conversion_type'] ?? '';
    $result = null;
    $from_value = null;
    $from_unit = '';
    $to_unit = '';

    // Handle Temperature Conversions
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
    }

    // Handle Speed Conversions
    elseif ($conversion_type === 'speed') {
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
    }

    // Handle Mass Conversions
    elseif ($conversion_type === 'mass') {
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

    // Format the result to 4 decimal places for precision
    if ($result !== null) {
        $result = number_format($result, 4);

        // Output result as JSON - this avoids the redirect and potential 405 errors
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

/**
 * Temperature Conversion Functions
 */

/**
 * Convert temperature from Celsius to Fahrenheit
 *
 * Formula: F = (C × 9/5) + 32
 *
 * @param float $celsius Temperature in Celsius
 * @return float Temperature in Fahrenheit
 */
function celsiusToFahrenheit($celsius)
{
    return ($celsius * 9) / 5 + 32;
}

/**
 * Convert temperature from Celsius to Kelvin
 *
 * Formula: K = C + 273.15
 *
 * @param float $celsius Temperature in Celsius
 * @return float Temperature in Kelvin
 */
function celsiusToKelvin($celsius)
{
    return $celsius + 273.15;
}

/**
 * Speed Conversion Functions
 */

/**
 * Convert speed from kilometers per hour to meters per second
 *
 * Formula: m/s = km/h ÷ 3.6
 *
 * @param float $kmh Speed in kilometers per hour
 * @return float Speed in meters per second
 */
function kmhToMs($kmh)
{
    return $kmh / 3.6;
}

/**
 * Convert speed from kilometers per hour to knots
 *
 * Formula: knots = km/h ÷ 1.852
 *
 * @param float $kmh Speed in kilometers per hour
 * @return float Speed in knots
 */
function kmhToKnots($kmh)
{
    return $kmh / 1.852;
}

/**
 * Mass Conversion Functions
 */

/**
 * Convert mass from kilograms to grams
 *
 * Formula: g = kg × 1000
 *
 * @param float $kg Mass in kilograms
 * @return float Mass in grams
 */
function kgToGrams($kg)
{
    return $kg * 1000;
}

/**
 * Convert mass from grams to kilograms
 *
 * Formula: kg = g ÷ 1000
 *
 * @param float $grams Mass in grams
 * @return float Mass in kilograms
 */
function gramsToKg($grams)
{
    return $grams / 1000;
}
