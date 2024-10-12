<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuário</title>
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" type="text/css" href="icons/fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/configurações.css">
</head>

<body>
    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="foto">
                    <img src="midias/imagem-perfil.jpg" alt="Foto do Perfil" class="profile-picture">
                </div>
                <h1 class="profile-name">Nome do Usuário</h1>
                <p class="profile-username">@username</p>
            </div>
            <div class="profile-info">
                <h2>Sobre Mim</h2>
                <p class="profile-bio">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero ipsam excepturi
                    quam, magni quia commodi laborum ratione! Odit fugit quod architecto dolorem praesentium similique,
                    minima velit! Molestiae nihil architecto vero!.</p>
                <h2>Detalhes</h2>
                <ul class="profile-details">
                    <li><strong>Email:</strong> usuario@exemplo.com</li>
                </ul>
            </div>
            <div class="profile-footer">
                <button class="edit-button">Editar</button>
                <button class="delete-button">Excluir Conta</button>
            </div>
        </div>
    </div>
    </div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Perfil</h2>
            <div class="conteudo">
                <div class="nome">
                    <h3>Nome</h3>
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <div class="foto-de-perfil">
                    <h3>Foto de Perfil</h3>
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <div class="sobre-mim">
                    <h3>Sobre Mim</h3>
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
                <div class="senha">
                    <h3>Senha</h3>
                    <i class="fa-regular fa-pen-to-square"></i>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-nome" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Nome</h2>
            <form class="form-nome">
                <label for="nome">
                    <input type="text" name="nome" id="nome" placeholder="Novo nome">
                </label>
                <p class="informe">Por favor! Não usar palavras palavras ofensivas ou preconceituosa.</p>
                <button id="concluir-nome">Concluir</button>
            </form>
        </div>
    </div>
    <div id="modal-foto" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Foto de Perfil</h2>
            <form class="form-foto">
                <label for="foto">
                    <input type="file" name="foto" id="foto">
                </label>
                <button id="concluir-foto">Concluir</button>
            </form>
        </div>
    </div>
    <div id="modal-sobre" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Sobre Mim</h2>
            <form class="form-sobre">
                <label for="sobre">
                    <textarea name="sobre" id="sobre" placeholder="Escreva sobre você"></textarea>
                </label>
                <p class="informe">Por favor! Não usar palavras palavras ofensivas ou preconceituosa.</p>
                <button id="concluir-sobre">Concluir</button>
            </form>
        </div>
    </div>
    <div id="modal-senha" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Editar Senha</h2>
            <form class="form-senha">
                <label for="senha-atual">
                    <input type="password" name="senha-atual" id="senha-atual" placeholder="Senha atual">
                </label>
                <label for="nova-senha">
                    <input type="password" name="nova-senha" id="nova-senha" placeholder="Nova senha">
                </label>
                <label for="confirmar-senha">
                    <input type="password" name="confirmar-senha" id="confirmar-senha"
                        placeholder="Confirmar nova senha">
                </label>
                <button id="concluir-senha">Concluir</button>
            </form>
        </div>
    </div>

    <script src="javascript/perfil.js"></script>
</body>

</html>