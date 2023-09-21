CREATE TABLE `lekcje` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `grafika` text COLLATE utf8_polish_ci NOT NULL,
  `autor` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `pracownicy` (
  `idp` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `ilosclogowan` int(11) NOT NULL,
  `ostatnielogowanie` datetime NOT NULL,
  `podejscdotestu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `pytanie` (
  `idq` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `tresc_pytania` text COLLATE utf8_polish_ci NOT NULL,
  `odp_a` text COLLATE utf8_polish_ci NOT NULL,
  `odp_b` text COLLATE utf8_polish_ci NOT NULL,
  `odp_c` text COLLATE utf8_polish_ci NOT NULL,
  `odp_d` text COLLATE utf8_polish_ci NOT NULL,
  `poprawna` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `szkoleniowcy` (
  `ids` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `test` (
  `idt` int(11) NOT NULL,
  `szkoleniowiec` text COLLATE utf8_polish_ci NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `max_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

CREATE TABLE `wyniki` (
  `id` int(11) NOT NULL,
  `nazwatestu` text COLLATE utf8_polish_ci NOT NULL,
  `pracownik` text COLLATE utf8_polish_ci NOT NULL,
  `wynik` text COLLATE utf8_polish_ci NOT NULL,
  `iloscprob` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

ALTER TABLE `lekcje`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`idp`);

ALTER TABLE `pytanie`
  ADD PRIMARY KEY (`idq`);

ALTER TABLE `szkoleniowcy`
  ADD PRIMARY KEY (`ids`);

ALTER TABLE `test`
  ADD PRIMARY KEY (`idt`);

ALTER TABLE `wyniki`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `lekcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `pracownicy`
  MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `pytanie`
  MODIFY `idq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `szkoleniowcy`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `test`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `wyniki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;