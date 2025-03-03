<?php

namespace Tests\Unit;

use App\Models\Fee;
use App\Models\User;
use Tests\TestCase;
use Carbon\Carbon;

class FeeTest extends TestCase
{

    /** @test */
    public function puede_crear_un_fee()
    {
        $user = User::factory()->create();

        $fee = Fee::factory()->create([
            'concept' => 'Pago mensual',
            'import' => 100.50,
            'due_date' => Carbon::now()->addDays(30),
            'is_paid' => false,
            'user_id' => $user->id,
            'notes' => 'Factura del mes',
            'currency_iso' => 'USD',
        ]);

        $this->assertDatabaseHas('fees', [
            'concept' => 'Pago mensual',
            'import' => 100.50,
            'is_paid' => false,
            'user_id' => $user->id,
            'notes' => 'Factura del mes',
            'currency_iso' => 'USD',
        ]);
    }

    /** @test */
    public function puede_actualizar_un_fee()
    {
        $fee = Fee::factory()->create();

        $fee->update([
            'import' => 200.75,
            'is_paid' => true,
            'notes' => 'Pago actualizado',
        ]);

        $this->assertDatabaseHas('fees', [
            'id' => $fee->id,
            'import' => 200.75,
            'is_paid' => true,
            'notes' => 'Pago actualizado',
        ]);
    }

    /** @test */
    public function puede_eliminar_un_fee()
    {
        $fee = Fee::factory()->create();

        $fee->delete();

        $this->assertDatabaseMissing('fees', [
            'id' => $fee->id,
        ]);
    }

    /** @test */
    public function due_date_se_guarda_correctamente()
    {
        $fee = Fee::factory()->create([
            'due_date' => '2025-06-15',
        ]);

        $this->assertDatabaseHas('fees', [
            'id' => $fee->id,
            'due_date' => '2025-06-15',
        ]);
    }
}
