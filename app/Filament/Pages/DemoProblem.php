<?php

namespace App\Filament\Pages;

use App\Filament\Shared\Resources\Chats\Schemas\MessageForm;
use App\Models\Chats\Message;
use Filament\Forms\Components\Textarea;
use Filament\Pages\Page;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;

class DemoProblem extends Page implements HasSchemas
{
    use InteractsWithSchemas;

    protected string $view = 'filament.demo-problem';

    public ?array $data = [];

    public function defaultForm(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel(false)
            ->operation('create')
            ->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('content')
                    ->label(ucfirst(__('chats.models.message.singular')))
                    ->hiddenLabel()
                    ->rows(1)
                    ->autosize()
                    ->placeholder(__('chats.forms.placeholders.message'))
                    ->required(),
            ]);
    }

}
