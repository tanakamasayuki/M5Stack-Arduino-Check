#ifndef Pins_Arduino_h
#define Pins_Arduino_h

#include <stdint.h>
#include "soc/soc_caps.h"

#define USB_VID          0x303a
#define USB_PID          0x1001
#define USB_MANUFACTURER "M5Stack"
#define USB_PRODUCT      "Nesso N1"

#define PIN_RGB_LED 20
// BUILTIN_LED can be used in new Arduino API digitalWrite() like in Blink.ino
static const uint8_t LED_BUILTIN = 7;
#define BUILTIN_LED LED_BUILTIN  // backward compatibility
#define LED_BUILTIN LED_BUILTIN  // allow testing #ifdef LED_BUILTIN
// RGB_BUILTIN and RGB_BRIGHTNESS can be used in new Arduino API rgbLedWrite()
#define RGB_BUILTIN    LED_BUILTIN
#define RGBLED         LED_BUILTIN
#define RGB_BRIGHTNESS 64

static const uint8_t BUT_BUILTIN = 9;
#define BUILTIN_BUT BUT_BUILTIN  // backward compatibility
#define BUT_BUILTIN BUT_BUILTIN  // allow testing #ifdef BUT_BUILTIN
#define BOOT        BUT_BUILTIN

static const uint8_t TX = 16;
static const uint8_t RX = 17;

// I2C PORT.A
static const uint8_t SCL = 8;
static const uint8_t SDA = 10;

static const uint8_t EX_SCL = 8;
static const uint8_t EX_SDA = 10;

static const uint8_t IN_SCL = 8;
static const uint8_t IN_SDA = 10;

static const uint8_t SS   = 17;
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
