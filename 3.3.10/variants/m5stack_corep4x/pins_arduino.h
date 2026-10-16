#ifndef Pins_Arduino_h
#define Pins_Arduino_h

#include <stdint.h>
#include "soc/soc_caps.h"

#define USB_MANUFACTURER "M5Stack"
#define USB_PRODUCT      "CoreP4X"

// BOOT_MODE 35
// BOOT_MODE2 36 pullup

static const uint8_t TX = 37;
static const uint8_t RX = 38;

// I2C PORT.A
static const uint8_t SCL = 16;
static const uint8_t SDA = 18;

static const uint8_t EX_SCL = 16;
static const uint8_t EX_SDA = 18;

static const uint8_t IN_SCL = 9;
static const uint8_t IN_SDA = 11;

static const uint8_t SS   = 50;
static const uint8_t MOSI = 7;
static const uint8_t MISO = 8;
static const uint8_t SCK  = 10;

static const uint8_t A0  = 16;
static const uint8_t A1  = 17;
static const uint8_t A2  = 18;
static const uint8_t A3  = 19;
static const uint8_t A4  = 20;
static const uint8_t A5  = 21;
static const uint8_t A6  = 22;
static const uint8_t A7  = 23;
static const uint8_t A8  = 49;
static const uint8_t A9  = 50;
static const uint8_t A10 = 51;
static const uint8_t A11 = 52;
static const uint8_t A12 = 53;
static const uint8_t A13 = 54;

static const uint8_t T0  = 2;
static const uint8_t T1  = 3;
static const uint8_t T2  = 4;
static const uint8_t T3  = 5;
static const uint8_t T4  = 6;
static const uint8_t T5  = 7;
static const uint8_t T6  = 8;
static const uint8_t T7  = 9;
static const uint8_t T8  = 10;
static const uint8_t T9  = 11;
static const uint8_t T10 = 12;
static const uint8_t T11 = 13;
static const uint8_t T12 = 14;
static const uint8_t T13 = 15;

//SDMMC
#define BOARD_HAS_SDMMC
#define BOARD_SDMMC_SLOT 0

// WIFI - ESP32C6
#define BOARD_HAS_SDIO_ESP_HOSTED
#define BOARD_SDIO_ESP_HOSTED_CLK   43
#define BOARD_SDIO_ESP_HOSTED_CMD   44
#define BOARD_SDIO_ESP_HOSTED_D0    45
#define BOARD_SDIO_ESP_HOSTED_D1    46
#define BOARD_SDIO_ESP_HOSTED_D2    47
#define BOARD_SDIO_ESP_HOSTED_D3    48
#define BOARD_SDIO_ESP_HOSTED_RESET 42

#endif /* Pins_Arduino_h */
