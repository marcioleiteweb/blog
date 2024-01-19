-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2024 às 17:28
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog_babi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ads_home`
--

CREATE TABLE `ads_home` (
  `id` int(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ads_home`
--

INSERT INTO `ads_home` (`id`, `link`, `foto`) VALUES
(1, 'sdvfvdf', 'fvdfv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ads_home_topo`
--

CREATE TABLE `ads_home_topo` (
  `id` int(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ads_home_topo`
--

INSERT INTO `ads_home_topo` (`id`, `link`, `foto`) VALUES
(3, 'https://www.marcioleiteweb.com.br/', '1621777848.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ads_interna`
--

CREATE TABLE `ads_interna` (
  `id` int(100) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ads_interna`
--

INSERT INTO `ads_interna` (`id`, `foto`, `link`) VALUES
(3, '1651380545.jpg', 'http://mlbn.com.br/'),
(4, '1651380564.jpg', 'http://mlbn.com.br/'),
(5, '1651380574.jpg', 'http://mlbn.com.br/'),
(6, '1651380597.jpg', 'http://mlbn.com.br/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner_home`
--

CREATE TABLE `banner_home` (
  `id` int(100) NOT NULL,
  `nome_banner` varchar(500) NOT NULL,
  `texto_banner` text NOT NULL,
  `link_foto_banner` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `banner_home`
--

INSERT INTO `banner_home` (`id`, `nome_banner`, `texto_banner`, `link_foto_banner`) VALUES
(9, 'banner1', 'texto1', '1665616221.jpg'),
(10, 'banner2', 'texto2', '1665616237.jpg'),
(11, 'banner3', 'texto3', '1665616266.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog_estados`
--

CREATE TABLE `blog_estados` (
  `id` int(100) NOT NULL,
  `id_estados` int(100) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `texto` text NOT NULL,
  `foto_principal` varchar(250) NOT NULL,
  `blog_album` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `blog_estados`
--

INSERT INTO `blog_estados` (`id`, `id_estados`, `titulo`, `texto`, `foto_principal`, `blog_album`) VALUES
(21, 5, 'artigo1', '<p>dddddddddddddddddddddddddd</p>', '1621285088.jpg', '1621282286'),
(23, 5, 'artigo 12', '<p>sdcascasdcasdc</p>', '1621469851.jpg', '1621469851');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_produtos`
--

CREATE TABLE `categorias_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificados`
--

CREATE TABLE `classificados` (
  `id` int(100) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `texto` text NOT NULL,
  `foto_principal` varchar(250) NOT NULL,
  `classificado_album` varchar(250) NOT NULL,
  `contato_bt` varchar(250) NOT NULL,
  `destaque` int(100) NOT NULL,
  `pub` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificados`
--

INSERT INTO `classificados` (`id`, `titulo`, `texto`, `foto_principal`, `classificado_album`, `contato_bt`, `destaque`, `pub`) VALUES
(17, 'Casa das Rosas na Paulista', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed auctor urna. Aenean suscipit velit eu enim auctor, quis tincidunt eros tristique. Nullam in elit eget mauris pretium scelerisque. Donec sed lacinia sapien. Sed quis sapien id nisl blandit sollicitudin. Proin eget scelerisque tellus. Ut malesuada lorem vitae odio facilisis porttitor. Ut odio mauris, tincidunt a turpis quis, vehicula congue nibh. Pellentesque in congue diam, quis cursus tellus. Phasellus augue dui, faucibus eu nulla molestie, pellentesque vehicula mi. Nulla in tortor iaculis, vestibulum ipsum at, semper ligula. In turpis leo, eleifend at neque id, volutpat sollicitudin orci. Aliquam nec nisl ac urna faucibus hendrerit. Sed scelerisque nibh quis sem vulputate hendrerit tempor id urna. Integer at purus ullamcorper, posuere odio id, faucibus justo.</p>\r\n<p>Nunc finibus augue vel arcu dictum vestibulum. Donec nec facilisis lectus. Vestibulum eget aliquam sem, et luctus enim. Aenean in auctor velit, ut tincidunt metus. Nulla tempus dapibus massa, at accumsan magna. Proin quis cursus augue. Integer neque turpis, placerat at neque quis, volutpat aliquet justo.</p>\r\n<p>Vestibulum mollis feugiat purus, finibus luctus ipsum placerat sed. Vestibulum eget rhoncus erat. Vivamus vestibulum felis tempus ipsum tincidunt, nec pellentesque nisl posuere. Duis id augue id metus tempor aliquam. Nulla ac tortor ut nisi consequat dapibus vitae at elit. Vivamus facilisis sed libero sit amet auctor. Morbi porta tortor et orci elementum ultricies. Vivamus fringilla est a laoreet vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus dictum pharetra nibh ut egestas. Donec dictum lectus tellus, rutrum feugiat nibh semper eget. Integer eget consectetur tortor, a gravida nisi. Donec mollis sagittis tristique. Donec quis tortor ullamcorper, maximus felis quis, laoreet felis.</p>', '1701912131.jpg', '1701912131', 'site casa das rosas', 1, 1),
(19, 'teste', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed auctor urna. Aenean suscipit velit eu enim auctor, quis tincidunt eros tristique. Nullam in elit eget mauris pretium scelerisque. Donec sed lacinia sapien. Sed quis sapien id nisl blandit sollicitudin. Proin eget scelerisque tellus. Ut malesuada lorem vitae odio facilisis porttitor. Ut odio mauris, tincidunt a turpis quis, vehicula congue nibh. Pellentesque in congue diam, quis cursus tellus. Phasellus augue dui, faucibus eu nulla molestie, pellentesque vehicula mi. Nulla in tortor iaculis, vestibulum ipsum at, semper ligula. In turpis leo, eleifend at neque id, volutpat sollicitudin orci. Aliquam nec nisl ac urna faucibus hendrerit. Sed scelerisque nibh quis sem vulputate hendrerit tempor id urna. Integer at purus ullamcorper, posuere odio id, faucibus justo.</p>\r\n<p>Nunc finibus augue vel arcu dictum vestibulum. Donec nec facilisis lectus. Vestibulum eget aliquam sem, et luctus enim. Aenean in auctor velit, ut tincidunt metus. Nulla tempus dapibus massa, at accumsan magna. Proin quis cursus augue. Integer neque turpis, placerat at neque quis, volutpat aliquet justo.</p>\r\n<p>Vestibulum mollis feugiat purus, finibus luctus ipsum placerat sed. Vestibulum eget rhoncus erat. Vivamus vestibulum felis tempus ipsum tincidunt, nec pellentesque nisl posuere. Duis id augue id metus tempor aliquam. Nulla ac tortor ut nisi consequat dapibus vitae at elit. Vivamus facilisis sed libero sit amet auctor. Morbi porta tortor et orci elementum ultricies. Vivamus fringilla est a laoreet vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus dictum pharetra nibh ut egestas. Donec dictum lectus tellus, rutrum feugiat nibh semper eget. Integer eget consectetur tortor, a gravida nisi. Donec mollis sagittis tristique. Donec quis tortor ullamcorper, maximus felis quis, laoreet felis.</p>', '1702046185.jpg', '1702046185', 'Cotia - SP', 0, 1),
(20, 'teste 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed auctor urna. Aenean suscipit velit eu enim auctor, quis tincidunt eros tristique. Nullam in elit eget mauris pretium scelerisque. Donec sed lacinia sapien. Sed quis sapien id nisl blandit sollicitudin. Proin eget scelerisque tellus. Ut malesuada lorem vitae odio facilisis porttitor. Ut odio mauris, tincidunt a turpis quis, vehicula congue nibh. Pellentesque in congue diam, quis cursus tellus. Phasellus augue dui, faucibus eu nulla molestie, pellentesque vehicula mi. Nulla in tortor iaculis, vestibulum ipsum at, semper ligula. In turpis leo, eleifend at neque id, volutpat sollicitudin orci. Aliquam nec nisl ac urna faucibus hendrerit. Sed scelerisque nibh quis sem vulputate hendrerit tempor id urna. Integer at purus ullamcorper, posuere odio id, faucibus justo.</p>\r\n<p>Nunc finibus augue vel arcu dictum vestibulum. Donec nec facilisis lectus. Vestibulum eget aliquam sem, et luctus enim. Aenean in auctor velit, ut tincidunt metus. Nulla tempus dapibus massa, at accumsan magna. Proin quis cursus augue. Integer neque turpis, placerat at neque quis, volutpat aliquet justo.</p>\r\n<p>Vestibulum mollis feugiat purus, finibus luctus ipsum placerat sed. Vestibulum eget rhoncus erat. Vivamus vestibulum felis tempus ipsum tincidunt, nec pellentesque nisl posuere. Duis id augue id metus tempor aliquam. Nulla ac tortor ut nisi consequat dapibus vitae at elit. Vivamus facilisis sed libero sit amet auctor. Morbi porta tortor et orci elementum ultricies. Vivamus fringilla est a laoreet vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus dictum pharetra nibh ut egestas. Donec dictum lectus tellus, rutrum feugiat nibh semper eget. Integer eget consectetur tortor, a gravida nisi. Donec mollis sagittis tristique. Donec quis tortor ullamcorper, maximus felis quis, laoreet felis.</p>', '1702057451.jpg', '1702057451', 'são paulo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `id` int(100) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `link_face` varchar(255) NOT NULL,
  `link_insta` varchar(255) NOT NULL,
  `foto_equipe` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`id`, `nome`, `cargo`, `link_face`, `link_insta`, `foto_equipe`) VALUES
(5, 'Marcio Oliveira Leite 1', 'web1', 'https://www.marcioleiteweb.com.br/', 'https://www.marcioleiteweb.com.br/', '1621126848.jpg'),
(6, 'Gabi', 'comercial', 'https://www.marcioleiteweb.com.br/', 'https://www.marcioleiteweb.com.br/', '1621126883.jpg'),
(7, 'rogerio', 'social', 'https://www.marcioleiteweb.com.br/', 'https://www.marcioleiteweb.com.br/', '1621126906.jpg'),
(8, 'Paula', 'vendas', 'https://www.marcioleiteweb.com.br/', 'https://www.marcioleiteweb.com.br/', '1621126932.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(100) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`) VALUES
(3, 'SÃ£o Paulo (SP)'),
(5, 'Minas Gerais (MG)'),
(6, 'Acre (AC)'),
(7, 'Alagoas (AL)'),
(8, 'AmapÃ¡ (AP)'),
(9, 'Amazonas (AM)'),
(10, 'Bahia (BA)'),
(11, 'CearÃ¡ (CE)'),
(12, 'Distrito Federal (DF)'),
(13, 'EspÃ­rito Santo (ES)'),
(14, 'GoiÃ¡s (GO)'),
(15, 'MaranhÃ£o (MA)'),
(16, 'Mato Grosso (MT)'),
(17, 'Mato Grosso do Sul (MS)'),
(18, 'ParÃ¡ (PA)'),
(19, 'ParaÃ­ba (PB)'),
(20, 'ParanÃ¡ (PR)'),
(21, 'Pernambuco (PE)'),
(22, 'PiauÃ­ (PI)'),
(23, 'Rio de Janeiro (RJ)'),
(24, 'Rio Grande do Norte (RN)'),
(25, 'Rio Grande do Sul (RS)'),
(26, 'RondÃ´nia (RO)'),
(27, 'Roraima (RR)'),
(28, 'Santa Catarina (SC)'),
(29, 'Santa Catarina (SC)'),
(30, 'Sergipe (SE)'),
(31, 'Tocantins (TO)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_na_home`
--

CREATE TABLE `estado_na_home` (
  `id` int(200) NOT NULL,
  `id_estados` int(200) NOT NULL,
  `nome_estado` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_blog_estados`
--

CREATE TABLE `fotos_blog_estados` (
  `id` int(100) NOT NULL,
  `id_blog_estados` int(100) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_classificados`
--

CREATE TABLE `fotos_classificados` (
  `id` int(100) NOT NULL,
  `id_classificados` int(100) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotos_classificados`
--

INSERT INTO `fotos_classificados` (`id`, `id_classificados`, `foto`, `nome`) VALUES
(111, 17, '26bbc1bd38a2e94c866777b1d6e54564.jpg', 'Barbara Naia'),
(112, 17, 'f7312e7a971e5df29d44a5c8e81c49a2.jpg', 'Parceiro 12'),
(113, 17, 'af9695153a3c52eaa490b147f23e4d99.jpg', 'jkhgkjuhyg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_obras`
--

CREATE TABLE `fotos_obras` (
  `id` int(100) NOT NULL,
  `id_obras` varchar(100) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos_produtos`
--

CREATE TABLE `fotos_produtos` (
  `id` int(100) NOT NULL,
  `id_produto` varchar(250) NOT NULL,
  `fotos_produto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membro`
--

CREATE TABLE `membro` (
  `id` int(100) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `profissao` varchar(300) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Administrador', '2016-03-25 00:00:00', NULL),
(3, 'Gerente', '2016-03-25 00:00:00', '2016-03-27 20:26:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `obras`
--

CREATE TABLE `obras` (
  `id` int(100) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `texto` varchar(800) NOT NULL,
  `foto_principal` varchar(250) NOT NULL,
  `obras_album` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(100) NOT NULL,
  `pergunta` varchar(250) NOT NULL,
  `resposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `categorias_produto_id` int(11) NOT NULL,
  `situacoes_produto_id` int(11) NOT NULL,
  `foto` varchar(120) DEFAULT NULL,
  `produto_album` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `preco`, `categorias_produto_id`, `situacoes_produto_id`, `foto`, `produto_album`, `descricao`, `created`, `modified`) VALUES
(280, 'toalha', 10, '15,00', 1, 1, '1641399993.jpg', '1641399931', '<p>descri&ccedil;&atilde;o do produto</p>', '2022-01-05 13:25:31', '2022-01-05 13:26:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_na_home`
--

CREATE TABLE `produtos_na_home` (
  `id` int(100) NOT NULL,
  `id_produtos` varchar(100) NOT NULL,
  `nome_categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_na_home`
--

INSERT INTO `produtos_na_home` (`id`, `id_produtos`, `nome_categoria`) VALUES
(4, '46', 'categoria1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quem_somos`
--

CREATE TABLE `quem_somos` (
  `id` int(100) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `foto_principal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quem_somos`
--

INSERT INTO `quem_somos` (`id`, `titulo`, `texto`, `foto_principal`) VALUES
(6, 'Bem Vindos a Alpha Pedras', '<p><span style=\"font-family: verdana, geneva, sans-serif;\">A <strong>Alpha Pedras</strong> Marmoraria em Cotia surgiu com o intuito de se tornar refer&ecirc;ncia no mercado, em nossa &aacute;rea de atua&ccedil;&atilde;o. Temos uma equipe qualificada e eficiente, comprometida em superar as expectativas dos nossos clientes. Atuamos com seriedade, transpar&ecirc;ncia e sobretudo, respeito. Prezamos sempre pela qualidade do atendimento, estando prontos para atender e satisfazer suas necessidades.</span></p>\r\n<p><span style=\"font-family: verdana, geneva, sans-serif;\">&nbsp;</span></p>\r\n<p><span style=\"font-family: verdana, geneva, sans-serif;\">A marmoraria Alpha Pedras, foi criada do sonho de um jovem empreendedor, com o objetivo de trazer novidades e pe&ccedil;as criativas para valorizar seja qual for o seu ambiente, dando-lhe um ar de sofistica&ccedil;&atilde;o e eleg&acirc;ncia.</span></p>\r\n<p><span style=\"font-family: verdana, geneva, sans-serif;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-family: verdana, geneva, sans-serif;\">Av. Ivo Mario Isaac Pires, 3205</span></strong></p>\r\n<p><strong><span style=\"font-family: verdana, geneva, sans-serif;\">Tijuco Preto - Cotia - SP</span></strong></p>\r\n<p><strong><span style=\"font-family: verdana, geneva, sans-serif;\">Fone: 3763-3415 - 94260-2081</span></strong></p>', '1660058623.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(100) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `titulo`, `texto`) VALUES
(6, 'GRANITOS', 'O granito é uma pedra natural formada por minerais como o quartzo transparente, o feldspato (principal responsável pela cor do granito) e a biotita escura. É mais duro que o mármore e não possui tantos veios.'),
(7, 'MARMORES', 'O mármore é uma pedra natural proveniente do calcário. Forma-se pela alta pressão, sendo uma rocha metamórfica. Caracteriza-se por seus veios, tem menos brilho que o granito e possui uma dureza menor que este, sendo por tanto mais frágil.'),
(8, 'QUARTZOS E PRIME', 'As pedras artificiais como o Quartzo e Prime, são utilizadas para ambientes internos, como cozinha e lavatórios. Essa nova tendência é utilizada por clientes que gostam do moderno e peças mais uniformes.'),
(10, 'PRIME', '<p>texto do prime2</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes`
--

CREATE TABLE `situacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacoes`
--

INSERT INTO `situacoes` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2016-03-25 00:00:00', NULL),
(2, 'Inativo', '2016-03-25 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_produtos`
--

CREATE TABLE `situacoes_produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacoes_produtos`
--

INSERT INTO `situacoes_produtos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativo', '2016-03-28 00:00:00', NULL),
(2, 'Inativo', '2016-03-28 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trabalhos_membro`
--

CREATE TABLE `trabalhos_membro` (
  `id` int(100) NOT NULL,
  `membro_id` varchar(250) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `arquivo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `senha` varchar(240) NOT NULL,
  `situacoe_id` int(11) NOT NULL,
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Marcio Leite', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2016-03-25 02:02:02', '2016-03-27 19:22:38'),
(5, 'Babi User', 'babis@gestor.com', '202cb962ac59075b964b07152d234b70', 1, 3, '2021-05-23 13:27:19', '2024-01-19 11:47:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(250) NOT NULL,
  `dono_whatsapp` varchar(250) NOT NULL,
  `numero_whatsapp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `dono_whatsapp`, `numero_whatsapp`) VALUES
(3, 'Whats do Marcio Dono', '11942602081');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ads_home`
--
ALTER TABLE `ads_home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ads_home_topo`
--
ALTER TABLE `ads_home_topo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ads_interna`
--
ALTER TABLE `ads_interna`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banner_home`
--
ALTER TABLE `banner_home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `blog_estados`
--
ALTER TABLE `blog_estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `classificados`
--
ALTER TABLE `classificados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estado_na_home`
--
ALTER TABLE `estado_na_home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos_blog_estados`
--
ALTER TABLE `fotos_blog_estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos_classificados`
--
ALTER TABLE `fotos_classificados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos_obras`
--
ALTER TABLE `fotos_obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos_produtos`
--
ALTER TABLE `fotos_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membro`
--
ALTER TABLE `membro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_na_home`
--
ALTER TABLE `produtos_na_home`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `quem_somos`
--
ALTER TABLE `quem_somos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `situacoes`
--
ALTER TABLE `situacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `situacoes_produtos`
--
ALTER TABLE `situacoes_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `trabalhos_membro`
--
ALTER TABLE `trabalhos_membro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ads_home`
--
ALTER TABLE `ads_home`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `ads_home_topo`
--
ALTER TABLE `ads_home_topo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `ads_interna`
--
ALTER TABLE `ads_interna`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `banner_home`
--
ALTER TABLE `banner_home`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `blog_estados`
--
ALTER TABLE `blog_estados`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `categorias_produtos`
--
ALTER TABLE `categorias_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `classificados`
--
ALTER TABLE `classificados`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `estado_na_home`
--
ALTER TABLE `estado_na_home`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fotos_blog_estados`
--
ALTER TABLE `fotos_blog_estados`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `fotos_classificados`
--
ALTER TABLE `fotos_classificados`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `fotos_obras`
--
ALTER TABLE `fotos_obras`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fotos_produtos`
--
ALTER TABLE `fotos_produtos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `membro`
--
ALTER TABLE `membro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT de tabela `produtos_na_home`
--
ALTER TABLE `produtos_na_home`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `quem_somos`
--
ALTER TABLE `quem_somos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `situacoes`
--
ALTER TABLE `situacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `situacoes_produtos`
--
ALTER TABLE `situacoes_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `trabalhos_membro`
--
ALTER TABLE `trabalhos_membro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
