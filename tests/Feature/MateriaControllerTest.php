<?php

use App\Models\Materia;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

uses(LazilyRefreshDatabase::class);

describe('materia management', function () {
    it('assigns a distinct auto-incrementing id to each materia', function () {
        $firstMateria = Materia::create([
            'nombre' => 'Matemáticas',
            'codigo' => 'MAT101',
            'creditos' => 5,
        ]);
        $secondMateria = Materia::create([
            'nombre' => 'Física',
            'codigo' => 'FIS101',
            'creditos' => 4,
        ]);

        expect($secondMateria->id)->toBeGreaterThan($firstMateria->id);
    });

    it('renders the edit form for the materia identified by its id', function () {
        $materia = Materia::create([
            'nombre' => 'Matemáticas',
            'codigo' => 'MAT101',
            'creditos' => 5,
        ]);

        $this->get(route('materia.edit', $materia))
            ->assertOk()
            ->assertSee('Editar materia')
            ->assertSee('value="Matemáticas"', false)
            ->assertSee('value="MAT101"', false);
    });

    it('updates the materia identified by its id', function () {
        $materia = Materia::create([
            'nombre' => 'Matemáticas',
            'codigo' => 'MAT101',
            'creditos' => 5,
        ]);

        $response = $this->put(route('materia.update', $materia), [
            'nombre' => 'Álgebra',
            'codigo' => 'ALG101',
            'creditos' => 6,
        ]);

        $response->assertRedirect('/materia')
            ->assertSessionHas('success', 'Materia actualizada exitosamente.');

        $this->assertDatabaseHas('materias', [
            'id' => $materia->id,
            'nombre' => 'Álgebra',
            'codigo' => 'ALG101',
            'creditos' => 6,
        ]);
    });

    it('deletes the materia identified by its id', function () {
        $materia = Materia::create([
            'nombre' => 'Matemáticas',
            'codigo' => 'MAT101',
            'creditos' => 5,
        ]);

        $response = $this->delete(route('materia.destroy', $materia));

        $response->assertRedirect('/materia')
            ->assertSessionHas('success', 'Materia eliminada exitosamente.');

        $this->assertDatabaseMissing('materias', ['id' => $materia->id]);
    });

    it('returns not found when an edit update or delete request uses an unknown id', function () {
        $unknownId = 999999;

        $this->get(route('materia.edit', $unknownId))->assertNotFound();
        $this->put(route('materia.update', $unknownId), [
            'nombre' => 'Álgebra',
            'codigo' => 'ALG101',
            'creditos' => 6,
        ])->assertNotFound();
        $this->delete(route('materia.destroy', $unknownId))->assertNotFound();
    });

    it('rejects a code already assigned to another materia', function () {
        $materia = Materia::create([
            'nombre' => 'Matemáticas',
            'codigo' => 'MAT101',
            'creditos' => 5,
        ]);
        Materia::create([
            'nombre' => 'Física',
            'codigo' => 'FIS101',
            'creditos' => 4,
        ]);

        $response = $this->put(route('materia.update', $materia), [
            'nombre' => 'Matemáticas',
            'codigo' => 'FIS101',
            'creditos' => 5,
        ]);

        $response->assertSessionHasErrors('codigo');

        $this->assertDatabaseHas('materias', [
            'id' => $materia->id,
            'codigo' => 'MAT101',
        ]);
    });
});
