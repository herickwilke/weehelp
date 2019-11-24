<?php

namespace App\Notifications;

use App\Chamado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovoChamado extends Notification
{
    use Queueable;
    
    private $chamado;
    
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct(Chamado $chamado)
    {
        //
        $this->chamado = $chamado;
    }
    
    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }
    
    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject("Novo chamado: {$this->chamado->titulo}")
        ->line("Novo chamado aberto. Descrição: {$this->chamado->descricao}")
        ->action("Ver o chamado", route('admin.chamados.show', $this->chamado->id))
        ->line('Foi aberto um novo chamado. E isso é uma ótima notícia! Notificações para e-mail estão funcionando!');
    }
    
    /**
    * Get the array representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function toArray($notifiable)
    {
        $teste = auth()->user()->name;
        return [
            'data' => "{$teste} criou o chamado nº {$this->chamado->id}, {$this->chamado->titulo}, atribuído a você."
        ];
    }
}
