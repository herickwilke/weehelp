<?php

namespace App\Notifications;

use App\TimeEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NovaTarefa extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TimeEntry $timeEntry)
    {
        //
        $this->tarefa = $timeEntry;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
        ->subject("Nova tarefa")
        ->line("Novo ch")
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
            'data' => "{$teste} criou a tarefa nº {$this->tarefa->id} atribuída a você."
        ];
    }
}
