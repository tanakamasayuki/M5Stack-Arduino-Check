#ifndef Pins_Arduino_h
#define Pins_Arduino_h

#include <stdint.h>
#include "soc/soc_caps.h"

static const uint8_t TX = 11;
static const uint8_t RX = 10;

static const uint8_t SDA = 0;
static const uint8_t SCL = 1;

static const uint8_t SS = 28;
static const uint8_t MOSI = 27;
static const uint8_t MISO = 26;
static const uint8_t SCK = 25;

static const uint8_t A0 = 0;
static const uint8_t A1 = 1;
static const uint8_t A2 = 2;
static const uint8_t A3 = 3;

// LP I2C Pins are fixed on ESP32-C61
#define WIRE1_PIN_DEFINED
static const uint8_t SDA1 = 6;
static const uint8_t SCL1 = 7;

#endif /* Pins_Arduino_h */
