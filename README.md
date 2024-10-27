# Laravel Cashier Paymob Package

## **Overview**
The **Laravel Cashier Paymob** package integrates **Paymob** as a payment gateway into Laravel applications by extending **Laravel Cashier**. This package enables payment handling through Paymob, supports card storage, manages subscriptions, and provides webhook event handling.

It offers publishable **configuration**, **migrations**, and **service provider** files, giving users the ability to modify them as needed.

---

> [!WARNING]
> **This package is still under development**. Expect breaking changes as features are added and refined. We recommend testing it in a development environment until the first stable release.

---

## **Installation & Setup**

1. **Install the package via Composer:**
```bash
composer require abdelrahman-dwedar/laravel-cashier-paymob
```

2. Set environment variables in .env:
```env
CASHIER_MODEL=App\Models\User
PAYMOB_INTEGRATION_ID=your_integration_id
PAYMOB_IFRAME_ID=your_iframe_id
PAYMOB_SAVE_CARDS=false
PAYMOB_WEBHOOK_TOLERANCE=300
```

---

## Publishing Resources

1. Publish all resources:
```bash
php artisan vendor:publish --provider="AbdelrahmanDwedar\CashierPaymob\CashierPaymobServiceProvider"
```

2. Publish individual resources:

  - Config:
  ```bash
  php artisan vendor:publish --tag="cashier-paymob-config"
  ```
  - Migrations:
  ```bash
  php artisan vendor:publish --tag="cashier-paymob-migrations"
  ```
  - Service Provider:
  ```bash
  php artisan vendor:publish --tag="cashier-paymob-provider"
  ```

---

## Planned Features
- **Publishable configurations and migrations** for easy customization.
- **Webhook event handling** for Paymob notifications.
- **Cashier extension** to support Paymob payments seamlessly.

---

## Package Structure
```
laravel-cashier-paymob/
├── composer.json
├── config/
│   └── cashier-paymob.php
├── database/
│   └── migrations/
│       ├── create_paymob_cards_table.php
│       └── create_paymob_subscriptions_table.php
└── src/
    ├── CashierPaymobServiceProvider.php
    ├── Models/
    │   ├── PaymobCard.php
    │   └── PaymobSubscription.php
    ├── PaymobClient.php
    ├── PaymobGateway.php
    ├── PaymobPayment.php
    └── WebhookController.php
```

---

## How It Works
1. **Service Provider Registration:** Registers the **Paymob client** and **webhook** routes.
2. **Migrations:** Creates database tables for **cards** and **subscriptions**.
3. **Configuration:** Allows endpoint and behavior customization.
4. **Cashier Extension:** Integrates Paymob's system into Laravel Cashier.

---

## Example Usage

```php
use AbdelrahmanDwedar\CashierPaymob\PaymobClient;

$paymob = app(PaymobClient::class);
$payment = $paymob->charge($amount, $customerData);
```

---

## Contributing
Contributions are welcome! Feel free to open an issue or submit a pull request.

---

## Roadmap
- Add **test cases** for package stability.
- Provide **stubs** for custom providers and migrations.
- Improve **webhook security** mechanisms.
