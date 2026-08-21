#ifndef Pins_Arduino_h
#define Pins_Arduino_h

#include <stdint.h>
#include "soc/soc_caps.h"

#define USB_VID          0x303a
#define USB_PID          0x1001
#define USB_MANUFACTURER "M5Stack"
#define USB_PRODUCT      "Unit C6L"

static const uint8_t TX = 16;
static const uint8_t RX = 17;

// I2C PORT.A
static const uint8_t SCL = 4;
static const uint8_t SDA = 5;

static const uint8_t EX_SCL = 4;
static const uint8_t EX_SDA = 5;

static const uint8_t IN_SCL = 8;
static const uint8_t IN_SDA = 10;

static const uint8_t SS   = 6;
static const uint8_t MOSI = 21;
static const uint8_t MISO = 22;
static const uint8_t SCK  = 20;

static const uint8_t A0 = 0;
static const uint8_t A1 = 1;
static const uint8_t A2 = 2;
static const uint8_t A3 = 3;
static const uint8_t A4 = 4;
static const uint8_t A5 = 5;
static const uint8_t A6 = 6;

// LP I2C Pins are fixed on ESP32-C6
#define WIRE1_PIN_DEFINED
static const uint8_t SDA1 = 6;
static const uint8_t SCL1 = 7;

#endif /* Pins_Arduino_h */
