<?php

namespace App\Repositories;

use App\Models\Permissao;

/**
 * Class PermissaoRepository
 * @package App\Repositories
 */
class PermissaoRepository extends BaseRepository
{
    /**
     * @var Permissao
     */
    public $model;

    /**
     * PermissaoRepository constructor.
     * @param Permissao $Permissao
     */
    public function __construct(Permissao $Permissao)
    {
        $this->model = $Permissao;
    }

    public function sincronizaRotas($rotas)
    {
        foreach ($rotas as $rota) {
            if (empty($this->model()->where('route', $rota)->first())) {
                $this->create([
                    'label' => str_replace('.', ' ', $rota),
                    'route' => $rota,
                    'exibe_menu' => 0,
                ]);
            }
        }
        return $this->all();
    }

    public function atualizaTodos($permissoes)
    {
        foreach ($permissoes['label'] as $id_permissao => $label) {
            $this->find($id_permissao)->update(['label' => $label]);
        }
        foreach ($permissoes['icon'] as $id_permissao => $icon) {
            $this->find($id_permissao)->update(['icon' => $icon]);
        }
        if (isset($permissoes['exibe_menu'])) {
            foreach ($permissoes['exibe_menu'] as $id_permissao => $exibe_menu) {
                $this->model->whereNotIn('id', [$id_permissao])->update(['exibe_menu' => 0]);
            }
            foreach ($permissoes['exibe_menu'] as $id_permissao => $exibe_menu) {
                $this->model->whereIn('id', [$id_permissao])->update(['exibe_menu' => 1]);
            }
        } else {
            foreach ($this->model->all() as $permissao) {
                $permissao->update(['exibe_menu' => 0]);
            }
        }
        return true;
    }
}