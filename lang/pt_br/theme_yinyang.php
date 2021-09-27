<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Language file.
 *
 * @package    theme_yinyang
 * @copyright  2020 onwards Willian Mano {@link http://conecti.me}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Yin-Yang';
$string['choosereadme'] = 'Yin-Yang é um tema moderno e altamente customizável. Este tema tem por objetivo ser usado diretamente, ou como um tema pai quando criados novos temas utilizando Bootstrap 4.';
$string['topic_progress'] = 'Conclusão do tópico';
$string['access'] = 'Acessar';
$string['prev_topic'] = 'Tópico anterior';
$string['prev_week'] = 'Semana anterior';
$string['next_topic'] = 'Próximo tópico';
$string['next_week'] = 'Próxima semana';
$string['region-side-pre'] = 'Direita';
$string['globalsearchtext'] = 'O que você está procurando?';
$string['darkmode-title'] = 'As cores estão afetando seus olhos?';
$string['darkmode-enable'] = 'Habilitar modo escuro';
$string['darkmode-disable'] = 'Desabilitar modo escuro';

// Data privacy.
$string['privacy:metadata:preference:dark-mode-on'] = 'Preferências do usuário para o modo escuro.';
$string['privacy:dark-mode-on'] = 'A preferência atual para o modo escuro é: {$a}.';

// Settings.
// General settings tab.
$string['generalsettings'] = 'Geral';
$string['logo_negative'] = 'Logo negativa';
$string['logo_negative_desc'] = 'Logo em tons de branco exibida no rodapé e na barra lateral quando o modo dark está ativado.';
$string['favicon'] = 'Favicon personalizado';
$string['favicon_desc'] = 'Envie seu próprio favicon. O arquivo deve ter a extensão .ico.';
$string['loginbg'] = 'Background da página de login';
$string['loginbg_desc'] = 'Envie sua própria imagem de fundo para a página de login.';
$string['loginposition'] = 'Posição da caixa de login';
$string['loginposition_desc'] = 'Onde você deseja posicionar a caixa de login na página de login.';
$string['loginposition_left'] = 'Esquerda';
$string['loginposition_center'] = 'Centralizado';
$string['loginposition_right'] = 'Direita';
$string['brandcolor'] = 'Cor da marca';
$string['brandcolor_desc'] = 'Cor principal.';

// Advanced settings tab.
$string['advancedsettings'] = 'Avançado';
$string['rawscsspre'] = 'SCSS inicial puro';
$string['rawscsspre_desc'] = 'Neste campo você pode fornecer código SCSS de inicialização, ele será injetado antes de tudo. Na maioria dos casos você usará esta configuração para setar variáveis.';
$string['rawscss'] = 'SCSS puro';
$string['rawscss_desc'] = 'Use este campo para fornecer código SCSS ou CSS que será injetado no final do arquivos de estilos.';
$string['googleanalytics'] = 'Código do Google Analytics';
$string['googleanalytics_desc'] = 'Por favor digite o código do Google Analytics para habilitá-lo no seu site. O código deve ter o formato [UA-XXXXX-Y]';

// Frontpage settings tab.
$string['headertext'] = 'Texto do cabeçalho';
$string['headertext_desc'] = 'Você pode adicionar qualquer texto HTML e usar quaisquer classes do Bootstrap disponíveis.';
$string['headerimage'] = 'Imagem do cabeçalho';
$string['headerimage_desc'] = 'Envie sua própria imagem de cabeçalho. Tamanho recomendado: 1922px x 844px, mas você pode ficar a vontade para criar sua imagem com as dimensões que achar ideal.';
$string['enablemarketingboxes'] = 'Habilitar caixas de marketing';
$string['enablemarketingboxes_desc'] = 'Quando habilitado, exibe três caixas de marketing na página inicial.';
$string['boxessubtitle'] = 'Subtítulo das caixas de marketing';
$string['boxestitle'] = 'Título das caixas de marketing';
$string['boxesdescription'] = 'Descrição das caixas de marketing';
$string['boximage'] = 'Imagem da caixa';
$string['boxtitle'] = 'Título da caixa';
$string['boxdescription'] = 'Descrição da caixa';
$string['boxurl'] = 'Link da caixa';
$string['frontpagesettings'] = 'Página inicial';
$string['logoscounter'] = 'Quantidade de logos';
$string['logoscounter_desc'] = 'Selecione quantas logos você quer adicionar e <strong> depois clique em SALVAR</strong> para carregar os campos do formulário.';
$string['logoimage'] = 'Logo';
$string['logourl'] = 'URL da logo';

// Footer settings tab.
$string['footersettings'] = 'Rodapé';
$string['address_desc'] = 'Digite seu endereço completo';
$string['mail'] = 'E-Mail';
$string['phone'] = 'Telefone';
$string['whatsapp'] = 'Whatsapp';
$string['whatsapp_desc'] = 'Digite o número do seu whatsapp para contato. Somente números!';
$string['facebook'] = 'Facebook URL';
$string['twitter'] = 'Twitter URL';
$string['linkedin'] = 'Linkedin URL';
$string['youtube'] = 'Youtube URL';
$string['instagram'] = 'Instagram URL';

// Contact numbers strings.
$string['somenumbers'] = 'Alguns números';
$string['somenumbers_desc'] = 'Números que refletem nossa credibilidade e confiança depositada em nós.';

// Footer strings.
$string['address'] = 'Endereço';
$string['phone'] = 'Telefone';
$string['email'] = 'Email';
$string['followus'] = 'Siga-nos';
$string['contactinfo'] = 'Informações para contato';
